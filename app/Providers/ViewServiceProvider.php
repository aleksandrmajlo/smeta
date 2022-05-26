<?php


namespace App\Providers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::share('trackingId', 'XXXXX-YYYYY-ZZZZZ');
    }
}
