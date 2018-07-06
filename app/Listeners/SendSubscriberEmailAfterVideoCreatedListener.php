<?php

namespace App\Listeners;

use App\Events\VideoCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Subscribe;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendSubscriberEmailAfterVideoCreatedMail;

class SendSubscriberEmailAfterVideoCreatedListener
{
   public function __construct()
   {
        //
   }

   public function handle(VideoCreatedEvent $event)
   {
      $subscribers = Subscribe::where('stat', 0)->get();

      foreach ($subscribers as $subscriber) {
         Mail::to($subscriber->email)->send(new SendSubscriberEmailAfterVideoCreatedMail($event->video));
      }
   }
}
