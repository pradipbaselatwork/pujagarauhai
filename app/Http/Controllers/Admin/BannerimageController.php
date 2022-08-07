<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Bannerimage;
use Image;


class BannerimageController extends Controller
{
    public function Bannerimage()
    {
        $bannerimage = Bannerimage::get();
        Session::flash('page', 'bannerimage');
        return view('admin.bannerimage.view_bannerimage', compact('bannerimage'));
    }

    public function addEditBannerimage(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Banner Image";
            $button ="Submit";
            $bannerimage = new Bannerimage;
            $bannerimagedata = array();
            $message = "Banner Image has been added sucessfully!";
        }else{
            $title = "Edit Banner Image";
            $button ="Update";
            $bannerimage = Bannerimage::where('id',$id)->first();
            $bannerimagedata= json_decode(json_encode($bannerimage),true);
            $bannerimage = Bannerimage::find($id);
            $message = "Banner Image has been updated sucessfully!";
        }
        if($request->isMethod('post')) {
          $data = $request->all();
    
            if(empty($data['link']))
            {
                $data['link'] = "";
            }
         
            if(!empty($data['image'])){
                $image_tmp = $data['image'];
                // dd($image_tmp);
                if($image_tmp->isValid())
                {
                    // get extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // generate new image name
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'images/bannerimage_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $bannerimage->image =$imagePath;
    
                }
            }
            $bannerimage->link = $data['link'];
            $bannerimage->save();
            Session::flash('success_message', $message);
            return redirect()->route('admin.bannerimage');
        }

        Session::flash('page', 'bannerimage');
        return view('admin.bannerimage.add_edit_bannerimage', compact('title','button','bannerimagedata'));
    }

    public function deleteBannerimage($id)
    {
      $id =Bannerimage::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Banner Image has been deleted successfully!');

    }
}