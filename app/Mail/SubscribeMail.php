<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Subscribe;

class SubscribeMail extends Mailable
{
   public $subscribe;

   public function __construct(Subscribe $subscribe)
   {
      $this->subscribe = $subscribe;
   }

   public function build()
   {
      return $this->view('mails.subscribes.subscribe');
   }
}
