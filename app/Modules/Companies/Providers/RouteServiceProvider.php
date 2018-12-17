<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 14.12.2018
 *
 */

namespace App\Modules\Companies\Providers;

use App\Helpers\SubDomain;
use App\Modules\Companies\Models\Company;
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
    protected $adminNamespace = 'App\Modules\Companies\Http\Controllers\Admin';

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->adminMap();
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

    public function boot()
    {
        parent::boot();

        Route::bind('company', function($value) {
            try {
                $company = Company::where('id', (int) $value)->firstOrFail();
            } catch (ModelNotFoundException $exception) {
                $exception->setModel('company');
                throw $exception;
            } catch (QueryException $exception) {
                $exception = new ModelNotFoundException();
                $exception->setModel('company');
                throw $exception;
            }
            return $company;
        });
    }
}
