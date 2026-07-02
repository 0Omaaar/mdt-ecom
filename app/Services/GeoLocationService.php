<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class GeoLocationService
{
    /**
     * Get geolocation data for an IP address using ip-api.com
     *
     * @param string $ip
     * @return array
     */
    public static function getLocation($ip)
    {
        $default = [
            'country' => 'Unknown',
            'city' => 'Unknown',
            'region' => 'Unknown',
            'latitude' => null,
            'longitude' => null,
        ];

        // Do not query for local IPs
        if (
            $ip === '127.0.0.1' || 
            $ip === '::1' || 
            filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false
        ) {
            $default['country'] = 'Localhost';
            $default['city'] = 'Localhost';
            return $default;
        }

        try {
            $response = Http::timeout(2)->get("http://ip-api.com/json/{$ip}?fields=status,message,country,regionName,city,lat,lon");

            if ($response->successful()) {
                $data = $response->json();
                
                if (isset($data['status']) && $data['status'] === 'success') {
                    return [
                        'country' => $data['country'] ?? 'Unknown',
                        'city' => $data['city'] ?? 'Unknown',
                        'region' => $data['regionName'] ?? 'Unknown',
                        'latitude' => $data['lat'] ?? null,
                        'longitude' => $data['lon'] ?? null,
                    ];
                }
            }
        } catch (\Exception $e) {
            // Silently fail and return default values
        }

        return $default;
    }

    /**
     * Anonymize an IP address for GDPR compliance
     *
     * @param string $ip
     * @return string
     */
    public static function anonymizeIp($ip)
    {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            return preg_replace('/[0-9]+$/', '0', $ip);
        } elseif (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
            $parts = explode(':', $ip);
            if (count($parts) >= 4) {
                return implode(':', array_slice($parts, 0, 4)) . '::';
            }
        }
        return $ip;
    }
}
