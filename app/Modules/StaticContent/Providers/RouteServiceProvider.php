<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 25.12.2018
 *
 */

namespace App\Modules\StaticContent\Providers;

use App\Helpers\SubDomain;
use App\Modules\StaticContent\Models\SocialLink;
use App\Modules\StaticContent\Models\StaticContent;
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
    protected $namespace = 'App\Modules\StaticContent\Http\Controllers';

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

        Route::bind('static_content', function ($value) {
            try {
                $staticContent = StaticContent::where('id', (int)$value)->firstOrFail();
            } catch (ModelNotFoundException $exception) {
                $exception->setModel('static-content');
                throw $exception;
            } catch (QueryException $exception) {
                $exception = new ModelNotFoundException();
                $exception->setModel('static-content');
                throw $exception;
            }
            return $staticContent;
        });

        Route::bind('who_we_are', function ($value) {
            try {
                $staticContent = StaticContent::where('id', (int)$value)->firstOrFail();
            } catch (ModelNotFoundException $exception) {
                $exception->setModel('who-we-are');
                throw $exception;
            } catch (QueryException $exception) {
                $exception = new ModelNotFoundException();
                $exception->setModel('who-we-are');
                throw $exception;
            }
            return $staticContent;
        });

        Route::bind('our_vision', function ($value) {
            try {
                $staticContent = StaticContent::where('id', (int)$value)->firstOrFail();
            } catch (ModelNotFoundException $exception) {
                $exception->setModel('our-vision');
                throw $exception;
            } catch (QueryException $exception) {
                $exception = new ModelNotFoundException();
                $exception->setModel('our-vision');
                throw $exception;
            }
            return $staticContent;
        });

        Route::bind('help', function ($value) {
            try {
                $staticContent = StaticContent::where('id', (int)$value)->firstOrFail();
            } catch (ModelNotFoundException $exception) {
                $exception->setModel('help');
                throw $exception;
            } catch (QueryException $exception) {
                $exception = new ModelNotFoundException();
                $exception->setModel('help');
                throw $exception;
            }
            return $staticContent;
        });

        Route::bind('term', function ($value) {
            try {
                $staticContent = StaticContent::where('id', (int)$value)->firstOrFail();
            } catch (ModelNotFoundException $exception) {
                $exception->setModel('term');
                throw $exception;
            } catch (QueryException $exception) {
                $exception = new ModelNotFoundException();
                $exception->setModel('term');
                throw $exception;
            }
            return $staticContent;
        });

        Route::bind('privacy_policy', function ($value) {
            try {
                $staticContent = StaticContent::where('id', (int)$value)->firstOrFail();
            } catch (ModelNotFoundException $exception) {
                $exception->setModel('privacy-policy');
                throw $exception;
            } catch (QueryException $exception) {
                $exception = new ModelNotFoundException();
                $exception->setModel('privacy-policy');
                throw $exception;
            }
            return $staticContent;
        });

        Route::bind('social_link', function ($value) {
            try {
                $socialLink = SocialLink::where('id', (int)$value)->firstOrFail();
            } catch (ModelNotFoundException $exception) {
                $exception->setModel('social-link');
                throw $exception;
            } catch (QueryException $exception) {
                $exception = new ModelNotFoundException();
                $exception->setModel('social-link');
                throw $exception;
            }
            return $socialLink;
        });
    }
}
