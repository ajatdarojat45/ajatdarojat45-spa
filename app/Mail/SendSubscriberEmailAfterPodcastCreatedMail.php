<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Podcast;

class SendSubscriberEmailAfterPodcastCreatedMail extends Mailable
{
   use Queueable, SerializesModels;

   public $podcast;

   public function __construct(Podcast $podcast)
   {
      $this->podcast = $podcast;
   }

   public function build()
   {
      return $this->view('mails.podcasts.podcastCreated');
   }
}
