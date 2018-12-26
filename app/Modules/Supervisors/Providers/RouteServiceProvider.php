<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.12.2018
 *
 */

namespace App\Modules\Supervisors\Providers;

use App\Helpers\SubDomain;
use App\Modules\Admins\Models\Admin;
use App\Modules\Permissions\Models\Role;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
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
    protected $namespace = 'App\Modules\Supervisors\Http\Controllers';

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        Route::domain(SubDomain::ADMIN . config('app.url'))
            ->middleware(['web', 'auth:admin'])
            ->namespace($this->namespace)
            ->group(__DIR__ . './../Routes/admin.php');
    }

    public function boot()
    {
        parent::boot();

        Route::bind('supervisor', function ($value) {
            try {
                $supervisor = Admin::with('roles')->where('id', (int)$value)->firstOrFail();
            } catch (ModelNotFoundException $exception) {
                $exception->setModel('supervisor');
                throw $exception;
            } catch (QueryException $exception) {
                $exception = new ModelNotFoundException();
                $exception->setModel('supervisor');
                throw $exception;
            }
            return $supervisor;
        });
    }
}
