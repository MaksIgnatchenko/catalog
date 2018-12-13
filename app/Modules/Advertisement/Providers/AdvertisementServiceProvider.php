<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 14.12.2018
 *
 */

namespace App\Modules\Advertisement\Providers;

use App\Modules\Advertisement\Models\Adblock;
use App\Modules\Advertisement\Observers\AdblockObserver;
use Illuminate\Support\ServiceProvider;

class AdvertisementServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Adblock::observe(AdblockObserver::class);
    }

}
