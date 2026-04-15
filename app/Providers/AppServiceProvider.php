<?php

namespace App\Providers;

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
      $path = public_path('data/nav-item.json');
      $navItems = json_decode(file_get_contents($path), true) ?? [];
      View::share('navItems', $navItems);
   }
}
