<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Blog;

class SendSubscriberEmailAfterBlogCreatedMail extends Mailable
{
   public $blog;

   public function __construct(Blog $blog)
   {
      $this->blog = $blog;
   }

   public function build()
   {
      return $this->view('mails.blogs.blogCreated');
   }
}
