<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 12.12.2018
 *
 */

namespace App\Modules\Advertisement\Providers;

use App\Helpers\SubDomain;
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
    protected $adminNamespace = 'App\Modules\Advertisement\Http\Controllers';

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->adminMap();
        $this->apiMap();
    }

    /**
     * Define the routes for the admin.
     *
     * @return void
     */

    public function adminMap()
    {
        Route::domain(SubDomain::ADMIN . config('app.url'))
            ->middleware(['web', 'auth:admin'])
            ->namespace($this->adminNamespace)
            ->group(__DIR__ . './../Routes/admin.php');
    }

    public function apiMap()
    {
        Route::prefix('api')
            ->namespace($this->adminNamespace)
            ->group(__DIR__ . './../Routes/api.php');
    }
}