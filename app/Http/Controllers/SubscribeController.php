<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subscribe;

class SubscribeController extends Controller
{
   public function index()
   {
      return Subscribe::orderBy('id','DESC')->get();
   }

   public function create()
   {
        //
   }

   public function store(Request $request)
   {
      // validation data
      $this->validate($request, [
        'email' => 'required',
        'type' => 'required',
      ]);

      // get data
      $subsscriber = Subscribe::where('email', $request->email)->first();

      // cek data kosong ataung engga
      if (empty($subsscriber)) {
         // insert data to db
         $subsscribe = Subscribe::create([
            'email'  => $request->email,
         ]);
         return 'subscribe berhasil';
      }else {
         if ($request->type == 'subscribe') {
            if ($subsscriber->stat == 1) {
               return 'sudah subscribe';
            }else{
               $subsscriber->stat = 1;
               $subsscriber->update();
               return 'subscribe berhasil';
            }
         }else {
            if ($subsscriber->stat == 0) {
               return 'sudah unsubscribe';
            }else{
               $subsscriber->stat = 0;
               $subsscriber->update();
               return 'unsubscribe berhasil';
            }
         }
      }
   }

   public function show($id)
   {

   }

   public function edit($id)
   {

   }

   public function update(Request $request, $id)
   {

   }

   public function destroy($id)
   {

   }

   public function toggleStat($id)
   {

   }
}
