<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

use App\Video;

class VideoCreatedEvent
{
   use Dispatchable, InteractsWithSockets, SerializesModels;

   public $video;

   public function __construct(Video $video)
   {
      $this->video = $video;
   }

   public function broadcastOn()
   {
      return new PrivateChannel('channel-name');
   }
}
