<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 27.12.2018
 *
 */

namespace App\Modules\Companies\Providers;

use App\Modules\Messages\Models\Message;
use App\Modules\Messages\Observers\MessageObserver;
use Illuminate\Support\ServiceProvider;

class MessageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Message::observe(MessageObserver::class);
    }

}