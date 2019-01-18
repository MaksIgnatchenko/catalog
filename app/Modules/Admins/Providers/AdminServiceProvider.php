<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 18.01.19
 *
 */

namespace App\Modules\Admins\Providers;

use Illuminate\Support\ServiceProvider;

class AdminServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(base_path() . '/app/Modules/Admins/Resources/views', 'admin');
    }
}