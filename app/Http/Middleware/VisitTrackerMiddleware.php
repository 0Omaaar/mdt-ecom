<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Auth;
use App\Models\Visit;
use App\Models\PageView;
use App\Services\GeoLocationService;

class VisitTrackerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // 1. Exclude certain requests
        if ($request->ajax() || $request->is('api/*')) {
            return $next($request);
        }

        // Exclude admin panel requests
        if ($request->is('admin*') || $request->routeIs('admin.*')) {
            return $next($request);
        }

        // Exclude authenticated admins
        if (config('analytics.exclude_admin') && Auth::check() && Auth::user()->type === 'admin') {
            return $next($request);
        }

        // 2. Check for GDPR consent
        if (config('analytics.require_consent')) {
            $consentCookie = request()->cookie(config('analytics.consent_cookie_name'));
            if ($consentCookie !== 'accepted') {
                return $next($request);
            }
        }

        // 3. Identify Visitor (UUID)
        $cookieName = config('analytics.cookie_name', 'visitor_uuid');
        $visitorId = $request->cookie($cookieName);
        $isNewVisitor = false;

        if (!$visitorId) {
            $visitorId = (string) Str::uuid();
            Cookie::queue($cookieName, $visitorId, 60 * 24 * 365); // 1 year cookie
            $isNewVisitor = true;
        }

        // We process tracking after response is sent if possible, but to keep it simple, we do it here.
        $this->trackVisit($request, $visitorId);

        return $next($request);
    }

    protected function trackVisit(Request $request, $visitorId)
    {
        $ip = $request->ip();
        
        // Find if there's an active session (visit in the last 30 minutes)
        $visit = Visit::where('visitor_id', $visitorId)
            ->where('created_at', '>=', now()->subMinutes(30))
            ->latest()
            ->first();

        if (!$visit) {
            // New visit session
            $geoData = GeoLocationService::getLocation($ip);
            
            $storedIp = $ip;
            if (config('analytics.anonymize_ips')) {
                $storedIp = GeoLocationService::anonymizeIp($ip);
            }

            $visit = Visit::create([
                'visitor_id' => $visitorId,
                'ip_address' => $storedIp,
                'user_agent' => substr($request->userAgent(), 0, 500),
                'country' => $geoData['country'],
                'city' => $geoData['city'],
                'region' => $geoData['region'],
                'latitude' => $geoData['latitude'],
                'longitude' => $geoData['longitude'],
                'visit_date' => now()->toDateString(),
            ]);
        } else {
            // Update updated_at to extend session
            $visit->touch();
        }

        // Record page view
        $url = $request->fullUrl();
        // Simple human-readable page title fallback based on path
        $path = $request->path();
        $title = $path === '/' ? 'Accueil' : ucfirst(str_replace('-', ' ', $path));

        PageView::create([
            'visit_id' => $visit->id,
            'url' => $url,
            'page_title' => $title,
            'referrer' => substr($request->headers->get('referer'), 0, 500),
        ]);
    }
}
