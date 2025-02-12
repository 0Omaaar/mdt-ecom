<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Console\Scheduling\Schedule;
use App\Console\Commands\SyncDolibarrProducts;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

$schedule = app(Schedule::class);

// Schedule the command to run every 5 minutes
$schedule->command(SyncDolibarrProducts::class)->everyMinute();
