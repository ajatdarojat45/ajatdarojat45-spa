<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;

class BlogController extends Controller
{
   public function index()
   {
      return Blog::orderBy('id','DESC')->get();
   }

   public function create()
   {
        //
   }

   public function store(Request $request)
   {
      // validation data
      $this->validate($request, [
        'title' => 'required',
        'content' => 'required',
      ]);

      // create slug
      $slug = str_slug($request->title, '-');
      if(Blog::where('slug', $slug)->first() != null)
      $slug = $slug.'-'.time();

      // insert data to db
      $blog = Blog::create([
         'title'        => $request->title,
         'slug'         => $slug,
         'content'      => $request->content,
         'image'        => $request->image,
      ]);

      return response()->json(['status' => 'success','msg'=>'post created successfully']);
   }

   public function show($id)
   {
      return Blog::find($id);
   }

   public function edit($id)
   {
      return Blog::find($id);
   }

   public function update(Request $request, $id)
   {
      $this->validate($request, [
        'title'   => 'required',
        'content' => 'required',
      ]);

      $blog = Blog::find($id);

      if($blog->count())
      {
         $blog->update($request->all());
         return response()->json(['statur'=>'success','msg'=>'Post updated successfully']);
      }
      else
      {
         return response()->json(['statur'=>'error','msg'=>'error in updating post']);
      }
   }

   public function destroy($id)
   {
      $blog = Blog::find($id);
      if($blog->count()){
         $blog->delete();
         return response()->json(['statur'=>'success','msg'=>'Post deleted successfully']);
      } else {
         return response()->json(['statur'=>'error','msg'=>'error in deleting post']);
      }
   }

   public function toggleStat($id)
   {
      $blog = Blog::find($id);

      if (!empty($blog)) {
         if ($blog->stat == 1) {
            $blog->stat = 0;
            $blog->update();
         }else{
            $blog->stat = 1;
            $blog->update();
         }
         return $blog;

      }else {
         return response()->json(['status'=>'error', 'msg'=>'Data not found']);
      }
   }
}
