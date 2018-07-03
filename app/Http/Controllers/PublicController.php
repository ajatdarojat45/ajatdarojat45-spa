<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Video;
use App\Podcast;
use App\Gift;

class PublicController extends Controller
{
   public function blog()
   {
      return Blog::where('stat', '1')->orderBy('created_at', 'desc')->get();
   }

   public function blogDetail($slug)
   {
      return Blog::where('slug', $slug)->first();
   }

   public function podcast()
   {
      return Podcast::where('stat', '1')->orderBy('created_at', 'desc')->get();
   }

   public function podcastDetail($slug)
   {
      return Podcast::where('slug', $slug)->first();
   }

   public function video()
   {
      return Video::where('stat', '1')->orderBy('created_at', 'desc')->get();
   }

   public function videoDetail($slug)
   {
      return Video::where('slug', $slug)->first();
   }

   public function gift()
   {
      return Gift::where('stat', '1')->orderBy('created_at', 'desc')->get();
   }
}
