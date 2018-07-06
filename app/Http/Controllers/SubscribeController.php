<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\SubscribeEvent;
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
      $subscriber = Subscribe::where('email', $request->email)->first();

      // cek data kosong ataung engga
      if (empty($subscriber)) {
         // insert data to db
         $subscribe = Subscribe::create([
            'email'  => $request->email,
         ]);

         event(new SubscribeEvent($subscribe));
         return 'subscribe berhasil';

      }else {
         if ($request->type == 'subscribe') {
            if ($subscriber->stat == 1) {
               return 'sudah subscribe';
            }else{
               $subscriber->stat = 1;
               $subscriber->update();

               event(new SubscribeEvent($subscriber));
               return 'subscribe berhasil';
            }
         }else {
            if ($subscriber->stat == 0) {
               return 'sudah unsubscribe';
            }else{
               $subscriber->stat = 0;
               $subscriber->update();

               event(new SubscribeEvent($subscriber));
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

   public function subscribe($email, $type)
   {
      $subscribe = Subscribe::where('email', $email)->first();

      if ($type == 'subscribe') {
         $subscribe->stat = 1;
         $subscribe->update();
      }else {
         $subscribe->stat = 0;
         $subscribe->update();
      }

      return view('mails.subscribes.subscribe', compact('subscribe'));
   }
}
