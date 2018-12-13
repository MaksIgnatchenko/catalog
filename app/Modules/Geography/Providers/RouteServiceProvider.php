<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 12.12.2018
 *
 */

namespace App\Modules\Geography\Providers;

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
    protected $apiNamespace = 'App\Modules\Geography\Http\Controllers';

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->apiMap();
    }

    /**
     * Define the routes for the admin.
     *
     * @return void
     */

    public function apiMap()
    {
        Route::prefix('api')
            ->namespace($this->apiNamespace)
            ->group(__DIR__ . './../Routes/api.php');
    }

    public function boot()
    {
        parent::boot();

        Route::bind('category', function($value) {
            return is_int($value) ? $value : null;
        });
    }
}
