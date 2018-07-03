<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gift;

class GiftController extends Controller
{
   public function index()
   {
      return Gift::orderBy('id','DESC')->get();
   }

   public function create()
   {
        //
   }

   public function store(Request $request)
   {
      $this->validate($request, [
        'name'                => 'required',
        'link'                => 'required',
        'documentation_link'  => 'required',
      ]);

      $gift = Gift::create([
         'name'               => $request->name,
         'content'            => $request->content,
         'link'               => $request->link,
         'documentation_link' => $request->documentation_link,
      ]);

      return response()->json(['status' => 'success','msg'=>'post created successfully']);
   }

   public function show($id)
   {
      return Gift::find($id);
   }

   public function edit($id)
   {
      return Gift::find($id);
   }

   public function update(Request $request, $id)
   {
      $this->validate($request, [
         'name'                => 'required',
         'link'                => 'required',
         'documentation_link'  => 'required',
      ]);

      $gift = Gift::find($id);

      if($gift->count())
      {
         $gift->update($request->all());
         return response()->json(['statur'=>'success','msg'=>'Post updated successfully']);
      }
      else
      {
         return response()->json(['statur'=>'error','msg'=>'error in updating post']);
      }
   }

   public function destroy($id)
   {
      $gift = Gift::find($id);
      if($gift->count()){
         $gift->delete();
         return response()->json(['statur'=>'success','msg'=>'Post deleted successfully']);
      } else {
         return response()->json(['statur'=>'error','msg'=>'error in deleting post']);
      }
   }

   public function toggleStat($id)
   {
      $gift = Gift::find($id);

      if (!empty($gift)) {
         if ($gift->stat == 1) {
            $gift->stat = 0;
            $gift->update();
         }else{
            $gift->stat = 1;
            $gift->update();
         }
         return $gift;

      }else {
         return response()->json(['status'=>'error', 'msg'=>'Data not found']);
      }
   }
}
