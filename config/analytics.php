<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Anonymize IP Addresses
    |--------------------------------------------------------------------------
    |
    | When enabled, IP addresses will be anonymized before being saved to the database.
    | The GeoIP lookup will still be performed using the real IP.
    |
    */
    'anonymize_ips' => env('ANALYTICS_ANONYMIZE_IPS', true),

    /*
    |--------------------------------------------------------------------------
    | Exclude Admin Visits
    |--------------------------------------------------------------------------
    |
    | When enabled, visits from authenticated admin users will not be tracked.
    |
    */
    'exclude_admin' => env('ANALYTICS_EXCLUDE_ADMIN', true),

    /*
    |--------------------------------------------------------------------------
    | Require Cookie Consent
    |--------------------------------------------------------------------------
    |
    | When enabled, tracking will only occur if the user has accepted cookies.
    | If disabled, tracking will occur regardless (GDPR less strict).
    |
    */
    'require_consent' => env('ANALYTICS_REQUIRE_CONSENT', false),

    /*
    |--------------------------------------------------------------------------
    | Cookie Name
    |--------------------------------------------------------------------------
    |
    | The name of the cookie used to store the visitor's UUID.
    |
    */
    'cookie_name' => env('ANALYTICS_COOKIE_NAME', 'visitor_uuid'),
    
    /*
    |--------------------------------------------------------------------------
    | Consent Cookie Name
    |--------------------------------------------------------------------------
    |
    | The name of the cookie used to check if the user consented to cookies.
    |
    */
    'consent_cookie_name' => env('ANALYTICS_CONSENT_COOKIE_NAME', 'cookie_consent_analytics'),
];
