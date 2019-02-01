<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.12.2018
 *
 */

namespace App\Modules\Visitors\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;


class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Modules\Visitors\Http\Controllers';

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(__DIR__ . './../Routes/public.php');
    }
}
