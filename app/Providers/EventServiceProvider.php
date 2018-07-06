<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\BlogCreatedEvent' => [
            'App\Listeners\SendSubscriberEmailAfterBlogCreatedListener',
        ],
        'App\Events\PodcastCreatedEvent' => [
            'App\Listeners\SendSubscriberEmailAfterPodcastCreatedListener',
        ],
        'App\Events\VideoCreatedEvent' => [
            'App\Listeners\SendSubscriberEmailAfterVideoCreatedListener',
        ],
        'App\Events\SubscribeEvent' => [
            'App\Listeners\SubscribeListener',
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
