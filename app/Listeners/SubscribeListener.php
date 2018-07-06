<?php

namespace App\Listeners;

use App\Events\SubscribeEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Mail\SubscribeMail;
use Illuminate\Support\Facades\Mail;

class SubscribeListener
{
   public function __construct()
   {
        //
   }

   public function handle(SubscribeEvent $event)
   {
      Mail::to($event->subscribe->email)->send(new SubscribeMail($event->subscribe));
   }
}
