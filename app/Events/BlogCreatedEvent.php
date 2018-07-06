<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\Blog;

class BlogCreatedEvent
{
   use Dispatchable, InteractsWithSockets, SerializesModels;

   public $blog;

   public function __construct(Blog $blog)
   {
      $this->blog = $blog;
   }

   public function broadcastOn()
   {
      return new PrivateChannel('channel-name');
   }
}
