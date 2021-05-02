<?php

namespace App\Providers;

use App\Helpers\DataUnitConversion;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('dataUnitConversion', fn() => new DataUnitConversion());
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Builder::macro('search', function ($field, $string) {
            return $string ? $this->where($field, 'like', "%{$string}%") : $this;
        });
    }
}
