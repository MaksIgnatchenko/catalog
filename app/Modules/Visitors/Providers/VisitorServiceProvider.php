<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 06.02.19
 *
 */

namespace App\Modules\Visitors\Providers;

use Illuminate\Support\ServiceProvider;

class VisitorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(base_path() . '/app/Modules/Visitors/Resources/views', 'visitor');
    }
}