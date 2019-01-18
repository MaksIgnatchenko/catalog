<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.12.2018
 *
 */

namespace App\Modules\Admins\Providers;

use App\Helpers\SubDomain;
use App\Modules\Admins\Models\Category;
use App\Modules\Admins\Models\Speciality;
use App\Modules\Admins\Models\Type;
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
    protected $adminNamespace = 'App\Modules\Admins\Http\Controllers';

    protected $apiNamespace = 'App\Modules\Admins\Http\Controllers\Api';

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
            ->middleware(['web'])
            ->namespace($this->adminNamespace)
            ->group(__DIR__ . './../Routes/admin.php');
    }

    /**
     * Define the routes for the api.
     *
     * @return void
     */

    public function apiMap()
    {
        Route::prefix('api')
            ->namespace($this->apiNamespace)
            ->middleware('bindings')
            ->group(__DIR__ . './../Routes/api.php');
    }

    public function boot()
    {
        parent::boot();

        Route::bind('category', function($value) {
            try {
                $category = Category::where('id', (int) $value)->firstOrFail();
            } catch (ModelNotFoundException $exception) {
                $exception->setModel('category');
                throw $exception;
            } catch (QueryException $exception) {
                $exception = new ModelNotFoundException();
                $exception->setModel('category');
                throw $exception;
            }
            return $category;
        });

        Route::bind('speciality', function($value) {
            try {
                $speciality = Speciality::where('id', (int) $value)->firstOrFail();
            } catch (ModelNotFoundException $exception) {
                $exception->setModel('speciality');
                throw $exception;
            } catch (QueryException $exception) {
                $exception = new ModelNotFoundException();
                $exception->setModel('speciality');
                throw $exception;
            }
            return $speciality;
        });

        Route::bind('type', function($value) {
            try {
                $type = Type::where('id', (int) $value)->firstOrFail();
            } catch (ModelNotFoundException $exception) {
                $exception->setModel('type');
                throw $exception;
            } catch (QueryException $exception) {
                $exception = new ModelNotFoundException();
                $exception->setModel('type');
                throw $exception;
            }
            return $type;
        });
    }
}
