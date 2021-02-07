<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        // extend validator with some custom validations for fields like organizator -> pozicija
        Validator::extend('required_if_array', function($attribute, $value, $params, $validator)
        {
            preg_match_all('/\d+/', $attribute, $matches);
            $id = (int)$matches[0][0];

            $matching_organizer_id = (int)$validator->getData()[$params[0]][$id];

            return ($matching_organizer_id >= (int)$params[1] && (int)$value > 0) || ($matching_organizer_id === 0 && (int)$value >= 0);
        });
    }
}
