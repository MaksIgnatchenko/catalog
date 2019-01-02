<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 27.12.2018
 *
 */

namespace App\Modules\StaticContent\Providers;

use App\Modules\StaticContent\Models\StaticContent;
use App\Modules\StaticContent\Observers\StaticContentObserver;
use Illuminate\Support\ServiceProvider;

class StaticContentServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        StaticContent::observe(StaticContentObserver::class);
    }

}