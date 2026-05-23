<?php

namespace App\Providers;

use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        AbstractPaginator::defaultView('pagination::bootstrap-5');
        AbstractPaginator::defaultSimpleView('pagination::simple-bootstrap-5');
    }
}
