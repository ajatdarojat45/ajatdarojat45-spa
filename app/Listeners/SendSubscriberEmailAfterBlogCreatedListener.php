<?php

namespace App\Listeners;

use App\Events\BlogCreatedEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Subscribe;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendSubscriberEmailAfterBlogCreatedMail;

class SendSubscriberEmailAfterBlogCreatedListener
{
   public function handle(BlogCreatedEvent $event)
   {
      $subscribers = Subscribe::where('stat', 0)->get();

      foreach ($subscribers as $subscriber) {
         Mail::to($subscriber->email)->send(new SendSubscriberEmailAfterBlogCreatedMail($event->blog));
      }
   }
}
