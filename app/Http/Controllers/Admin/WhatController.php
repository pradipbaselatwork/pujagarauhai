<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\What;


class WhatController extends Controller
{
    public function editWhat(Request $request, $id=null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $what =  What::find($id);
            $what->what = $data['what'];
            $what->how = $data['how'];
            $what->save(); 
            Session::flash('success_message','About updated successfully!');
            return redirect()->back();

         }
         Session::flash('page', 'what');
         $what = What::first();
         return view('admin.what.view_what', compact('what'));
    }

}
