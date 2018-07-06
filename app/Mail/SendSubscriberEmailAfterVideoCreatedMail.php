<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Video;

class SendSubscriberEmailAfterVideoCreatedMail extends Mailable
{
   use Queueable, SerializesModels;

   public $video;

   public function __construct(Video $video)
   {
      $this->video = $video;
   }

   public function build()
   {
      return $this->view('mails.videos.videoCreated');
   }
}
