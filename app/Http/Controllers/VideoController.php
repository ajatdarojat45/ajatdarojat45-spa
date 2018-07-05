<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use Auth;

class VideoController extends Controller
{
   public function index()
   {
      return Video::orderBy('id', 'DESC')->get();
   }

   public function create()
   {
        //
   }

   public function store(Request $request)
   {
      $this->validate($request, [
        'name'          => 'required',
        'description'   => 'required',
        'embed'         => 'required'
      ]);

      $slug = str_slug($request->name, '-');
      if(Video::where('slug', $slug)->first() != null)
      $slug = $slug.'-'.time();

      $video = Video::create([
         'name'         => $request->name,
         'slug'         => $slug,
         'description'  => $request->description,
         'embed'        => $request->embed,
      ]);

      return response()->json(['status' => 'success','msg'=>'post created successfully']);
   }

   public function show($id)
   {
      return Video::find($id);
   }

   public function edit($id)
   {
      return Video::find($id);
   }

   public function update(Request $request, $id)
   {
      $this->validate($request, [
         'name'          => 'required',
         'description'   => 'required',
         'embed'         => 'required'
      ]);

      $video = Video::find($id);

      if($video->count()){
         $video->update($request->all());
         return response()->json(['statur'=>'success','msg'=>'Post updated successfully']);
      }else{
         return response()->json(['statur'=>'error','msg'=>'error in updating post']);
      }
   }

   public function destroy($id)
   {
      $video = Video::find($id);
      if($video->count()){
         $video->delete();
         return response()->json(['statur'=>'success','msg'=>'Post deleted successfully']);
      } else {
         return response()->json(['statur'=>'error','msg'=>'error in deleting post']);
      }
   }

   public function toggleStat($id)
   {
      $video = Video::find($id);

      if (!empty($video)) {
         if ($video->stat == 1) {
            $video->stat = 0;
            $video->update();
         }else{
            $video->stat = 1;
            $video->update();
         }
         return $video;

      }else {
         return response()->json(['status'=>'error', 'msg'=>'Data not found']);
      }
   }

   public function getVideosActive()
   {
      return Video::where('stat', '1')->orderBy('created_at', 'desc')->get();
   }

   public function getVideo($slug)
   {
      $video = Video::where('slug', $slug)->first();
      if (Auth::guest()) {
         // input visitor
         $video->visitor = $video->visitor + 1;
         $video->save();
      }

      return $video;
   }
}
