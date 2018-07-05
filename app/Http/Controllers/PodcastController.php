<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Podcast;
use Auth;

class PodcastController extends Controller
{
   public function index()
   {
      return Podcast::orderBy('id', 'DESC')->get();
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
      if(Podcast::where('slug', $slug)->first() != null)
      $slug = $slug.'-'.time();

      $podcast = Podcast::create([
         'name'         => $request->name,
         'slug'         => $slug,
         'description'  => $request->description,
         'embed'        => $request->embed,
      ]);

      return response()->json(['status' => 'success','msg'=>'post created successfully']);
   }

   public function show($id)
   {
      return Podcast::find($id);
   }

   public function edit($id)
   {
      return Podcast::find($id);
   }

   public function update(Request $request, $id)
   {
      $this->validate($request, [
         'name'          => 'required',
         'description'   => 'required',
         'embed'         => 'required'
      ]);

      $podcast = Podcast::find($id);

      if($podcast->count()){
         $podcast->update($request->all());
         return response()->json(['statur'=>'success','msg'=>'Post updated successfully']);
      }else{
         return response()->json(['statur'=>'error','msg'=>'error in updating post']);
      }
   }

   public function destroy($id)
   {
      $podcast = Podcast::find($id);
      if($podcast->count()){
         $podcast->delete();
         return response()->json(['statur'=>'success','msg'=>'Post deleted successfully']);
      } else {
         return response()->json(['statur'=>'error','msg'=>'error in deleting post']);
      }
   }

   public function toggleStat($id)
   {
      $podcast = Podcast::find($id);

      if (!empty($podcast)) {
         if ($podcast->stat == 1) {
            $podcast->stat = 0;
            $podcast->update();
         }else{
            $podcast->stat = 1;
            $podcast->update();
         }
         return $podcast;

      }else {
         return response()->json(['status'=>'error', 'msg'=>'Data not found']);
      }
   }

   public function getPodcastsActive()
   {
      return Podcast::where('stat', '1')->orderBy('created_at', 'desc')->get();
   }

   public function getPodcast($slug)
   {
      $podcast = Podcast::where('slug', $slug)->first();
      if (Auth::guest()) {
         // input visitor
         $podcast->visitor = $podcast->visitor + 1;
         $podcast->save();
      }

      return $podcast;
   }
}
