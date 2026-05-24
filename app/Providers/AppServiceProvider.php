<?php

namespace App\Providers;

use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }

        AbstractPaginator::defaultView('pagination::bootstrap-5');
        AbstractPaginator::defaultSimpleView('pagination::simple-bootstrap-5');
    }
}
