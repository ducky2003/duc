<?php

namespace App\Providers;
use App\Models\Menu;
use App\Models\About;
use App\Models\Service;
use App\Models\Region;
use App\Models\Packet;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
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
        $menu = Menu::all();
        View::share('menu', $menu);

        $about = About::all();
        View::share('about', $about);

        $service = Service::all();
        View::share('service', $service);

        $region = Region::all();
        View::share('region', $region);

        $packet = Packet::all();
        View::share('packet', $packet);
    }
}
