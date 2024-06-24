<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use App\Console\Commands\CheckUpcomingBills;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


// Register and schedule the CheckUpcomingBills command
Artisan::command('bills:check-upcoming', function () {
    $this->call(CheckUpcomingBills::class);
})->purpose('Check for upcoming bills and notify users')->daily();