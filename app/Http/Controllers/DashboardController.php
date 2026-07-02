<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visit;
use App\Models\PageView;
use App\Models\ContactSubmission;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function analytics(Request $request)
    {
        // Date Filtering
        $startDate = $request->input('start_date', Carbon::now()->subDays(30)->toDateString());
        $endDate = $request->input('end_date', Carbon::now()->toDateString());

        // Basic Stats
        $totalVisits = Visit::whereBetween('visit_date', [$startDate, $endDate])->count();
        $uniqueVisitors = Visit::whereBetween('visit_date', [$startDate, $endDate])
            ->distinct('visitor_id')
            ->count('visitor_id');
            
        $totalPageViews = PageView::whereHas('visit', function($q) use ($startDate, $endDate) {
            $q->whereBetween('visit_date', [$startDate, $endDate]);
        })->count();

        // Real-time online (Visits updated in last 5 mins)
        $onlineVisitors = Visit::where('updated_at', '>=', Carbon::now()->subMinutes(5))->count();

        $todayVisits = Visit::where('visit_date', Carbon::today()->toDateString())->count();
        $thisWeekVisits = Visit::whereBetween('visit_date', [Carbon::now()->startOfWeek()->toDateString(), Carbon::now()->endOfWeek()->toDateString()])->count();
        $thisMonthVisits = Visit::whereBetween('visit_date', [Carbon::now()->startOfMonth()->toDateString(), Carbon::now()->endOfMonth()->toDateString()])->count();

        // Submissions count
        $totalSubmissions = ContactSubmission::whereBetween('created_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59'])->count();

        // Chart Data: Visits over time
        $visitsOverTime = Visit::select('visit_date', DB::raw('count(*) as count'))
            ->whereBetween('visit_date', [$startDate, $endDate])
            ->groupBy('visit_date')
            ->orderBy('visit_date', 'asc')
            ->get();

        $chartDates = $visitsOverTime->pluck('visit_date')->map(function($date) {
            return Carbon::parse($date)->format('d M');
        })->toArray();
        $chartVisits = $visitsOverTime->pluck('count')->toArray();

        // Chart Data: Visits by Country
        $visitsByCountry = Visit::select('country', DB::raw('count(*) as count'))
            ->whereBetween('visit_date', [$startDate, $endDate])
            ->groupBy('country')
            ->orderByDesc('count')
            ->take(10)
            ->get();
            
        $countryLabels = $visitsByCountry->pluck('country')->toArray();
        $countryData = $visitsByCountry->pluck('count')->toArray();

        // Top Pages
        $topPages = PageView::select('url', 'page_title', DB::raw('count(*) as views'))
            ->whereHas('visit', function($q) use ($startDate, $endDate) {
                $q->whereBetween('visit_date', [$startDate, $endDate]);
            })
            ->groupBy('url', 'page_title')
            ->orderByDesc('views')
            ->take(10)
            ->get();

        // Recent Visitors
        $recentVisitors = Visit::withCount('pageViews')
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        return view('admin.analytics', compact(
            'startDate', 'endDate',
            'totalVisits', 'uniqueVisitors', 'totalPageViews',
            'onlineVisitors', 'todayVisits', 'thisWeekVisits', 'thisMonthVisits',
            'totalSubmissions',
            'chartDates', 'chartVisits',
            'countryLabels', 'countryData',
            'topPages', 'recentVisitors'
        ));
    }

    public function exportCsv(Request $request)
    {
        $startDate = $request->input('start_date', Carbon::now()->subDays(30)->toDateString());
        $endDate = $request->input('end_date', Carbon::now()->toDateString());

        $visits = Visit::withCount('pageViews')
            ->whereBetween('visit_date', [$startDate, $endDate])
            ->orderBy('created_at', 'desc')
            ->get();

        $fileName = 'analytics_' . $startDate . '_to_' . $endDate . '.csv';

        $headers = array(
            "Content-type"        => "text/csv",
            "Content-Disposition" => "attachment; filename=$fileName",
            "Pragma"              => "no-cache",
            "Cache-Control"       => "must-revalidate, post-check=0, pre-check=0",
            "Expires"             => "0"
        );

        $columns = array('ID', 'Visitor ID', 'IP', 'Country', 'City', 'Browser/OS', 'Date', 'Page Views');

        $callback = function() use($visits, $columns) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $columns);

            foreach ($visits as $visit) {
                $row['ID']  = $visit->id;
                $row['Visitor ID'] = $visit->visitor_id;
                $row['IP'] = $visit->ip_address;
                $row['Country'] = $visit->country;
                $row['City'] = $visit->city;
                $row['Browser/OS'] = $visit->user_agent;
                $row['Date'] = $visit->created_at;
                $row['Page Views'] = $visit->page_views_count;

                fputcsv($file, array($row['ID'], $row['Visitor ID'], $row['IP'], $row['Country'], $row['City'], $row['Browser/OS'], $row['Date'], $row['Page Views']));
            }
            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }
}
