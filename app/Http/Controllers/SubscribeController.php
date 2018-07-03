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
