<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 13.12.2018
 *
 */

namespace App\Modules\Geography\Providers;

use App\Modules\Geography\Services\GeographyService;
use App\Modules\Geography\Services\GeographyServiceInterface;
use Carbon\Laravel\ServiceProvider;

class GeographyServiceProvider extends ServiceProvider
{
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(GeographyServiceInterface::class, function () {
            return new GeographyService();
        });
    }

    public function provides()
    {
        return [GeographyServiceInterface::class];
    }
}
