<?php

namespace App\Providers;

use App\View\Composers\NotificationComposer;
use App\View\Composers\CategoryComposer;
use App\View\Composers\WalletComposer;
use Illuminate\Support\Facades;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Using class based composers...
        Facades\View::composer('layouts.app', NotificationComposer::class);
        Facades\View::composer('layouts.app', CategoryComposer::class);
        Facades\View::composer('layouts.app', WalletComposer::class);
    }
}
