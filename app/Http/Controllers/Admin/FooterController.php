<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Footer;

class FooterController extends Controller
{
    public function editFooter(Request $request, $id=null)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();
            $rfooter =  Footer::find($id);
            $rfooter->mail = $data['mail'];
            $rfooter->number = $data['number'];
            $rfooter->address = $data['address'];
            $rfooter->description = $data['description'];
            $rfooter->information = $data['information'];
            $rfooter->fb_url = $data['fb_url'];
            $rfooter->twitter_url = $data['twitter_url'];
            $rfooter->LinkedIn_url = $data['LinkedIn_url'];
            $rfooter->instagram_url = $data['instagram_url'];
            $rfooter->utube_url = $data['utube_url'];
            $rfooter->save(); 
            Session::flash('success_message','Footer updated successfully!');
            return redirect()->back();

         }
         Session::flash('page', 'footer');
         $footer = Footer::first();
         return view('admin.footer.view_footer', compact('footer'));
    }

}
