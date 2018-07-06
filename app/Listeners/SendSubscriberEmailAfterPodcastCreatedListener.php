<?php

namespace App\Listeners;

use App\Events\PodcastCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Subscribe;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendSubscriberEmailAfterPodcastCreatedMail;

class SendSubscriberEmailAfterPodcastCreatedListener
{
   public function __construct()
   {
        //
   }

   public function handle(PodcastCreatedEvent $event)
   {
      $subscribers = Subscribe::where('stat', 0)->get();

      foreach ($subscribers as $subscriber) {
         Mail::to($subscriber->email)->send(new SendSubscriberEmailAfterPodcastCreatedMail($event->podcast));
      }
   }
}
