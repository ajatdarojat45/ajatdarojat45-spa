<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DisplayPicture;

class DisplayPictureController extends Controller
{
   public function index()
   {
      $fetch =  DisplayPicture::orderBy('id','DESC')->get();
      $currrentDisplayPicture = DisplayPicture::where('stat', 1)->first();

      return json_encode(array(
         'fetch' => $fetch,
         'currrentDisplayPicture' => $currrentDisplayPicture
      ));
   }

   public function create()
   {
        //
   }

   public function store(Request $request)
   {
      // validation data
      $this->validate($request, [
        'image' => 'required',
      ]);

      // insert data to db
      $displayPicture = DisplayPicture::create([
         'image'        => $request->image,
      ]);

      return response()->json(['status' => 'success','msg'=>'post created successfully']);
   }

   public function show($id)
   {

   }

   public function edit($id)
   {
      return DisplayPicture::find($id);
   }

   public function update(Request $request, $id)
   {
      return DisplayPicture::find($id);
   }

   public function destroy($id)
   {
      // get data
      $displayPicture = DisplayPicture::find($id);

      if($displayPicture->count()){
         $displayPicture->delete();
         return response()->json(['statur'=>'success','msg'=>'Post deleted successfully']);
      } else {
         return response()->json(['statur'=>'error','msg'=>'error in deleting post']);
      }
   }

   public function toggleStat($id)
   {
      // $currrentDisplayPicture = DisplayPicture::where('stat', 1)->first();
      // change data
      DisplayPicture::where('stat', 1)->update(['stat' => 0]);
      // get data
      $displayPicture = DisplayPicture::find($id);
      // update data
      $displayPicture->update([
         'stat' => 1
      ]);
      // return
      return response()->json(['statur'=>'success','msg'=>'Post deleted successfully']);
   }

   public function getDisplayPictureActive()
   {
      return DisplayPicture::where('stat', 1)->first();
   }
}
