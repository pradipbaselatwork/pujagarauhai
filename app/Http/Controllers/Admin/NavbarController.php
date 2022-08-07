<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Navbar;

class NavbarController extends Controller
{
    public function Navbar()
    {
        $navbar = Navbar::get();
        Session::flash('page', 'navbar');
        return view('admin.navbar.view_navbar', compact('navbar'));
    }

    public function updateNavbarStatus(Request $request){
        if($request->ajax()){
            $data = $request->all();
            //echo "<pre>"; print_r($data); die;
            if($data['status']=="Active"){
                $status = 0;
            }else{
                $status = 1;
            }
            Navbar::where('id',$data['navbar_id'])->update(['status'=>$status]);
            return response()->json(['status'=>$status,'navbar_id'=>$data['navbar_id']]);
        }
    }

    public function addEditNavbar(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Navbar";
            $button ="Submit";
            $navbar = new Navbar;
            $navbardata = array();
            $message = "Navbar has been added sucessfully!";
        }else{
            $title = "Edit Navbar";
            $button ="Update";
            $navbar = Navbar::where('id',$id)->first();
            $navbardata= json_decode(json_encode($navbar),true);
            $navbar = Navbar::find($id);
            $message = "Navbar has been updated sucessfully!";
        }
        if($request->isMethod('post')) {
          $data = $request->all();
            //dd($data);
            // if(empty($data['title'])){
            //     return redirect()->back()->with('error_message', 'Title is required !');
            // }
    
            if(empty($data['category_name']))
            {
                return redirect()->back()->with('error_message', 'Category name is required !');
            }
         
            if(empty($data['url']))
            {
                $data['url'] = "";
            }

            if(empty($data['meta_title']))
            {
                $data['meta_title'] = "";
            }
            if(empty($data['meta_description']))
            {
                $data['meta_description'] = "";
            }
            if(empty($data['meta_keyword']))
            {
                $data['meta_keyword'] = "";
            }
       
            $navbar->category_name = $data['category_name'];
            // $navbar->show_header = $data['show_header'];
            $navbar->url = $data['url'];
            $navbar->meta_title = $data['meta_title'];
            $navbar->meta_description = $data['meta_description'];
            $navbar->meta_keyword = $data['meta_keyword'];
            $navbar->status = 1;
            $navbar->save();
            Session::flash('success_message', $message);
            return redirect('admin/navbar');
        }
        Session::flash('page', 'navbar');
        return view('admin.navbar.add_edit_navbar', compact('title','button','navbardata'));
    }

    public function deleteNavbar($id)
    {
      $id =Navbar::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Navbar has been deleted successfully!');

    }
}

