<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\AboutUs;
use Image;


class AboutUsController extends Controller
{
    public function AboutUs()
    {
        $aboutUs = AboutUs::get();
        Session::flash('page', 'aboutUs');
        return view('admin.aboutUs.view_aboutUs', compact('aboutUs'));
    }

    public function addEditAboutUs(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add AboutUs";
            $button ="Submit";
            $aboutUs = new AboutUs;
            $aboutUsdata = array();
            $message = "AboutUs has been added sucessfully";
        }else{
            $title = "Edit AboutUs";
            $button ="Update";
            $aboutUs = AboutUs::where('id',$id)->first();
            $aboutUsdata= json_decode(json_encode($aboutUs),true);
            $aboutUs = AboutUs::find($id);
            $message = "AboutUs has been updated sucessfully";
            
        }
        if($request->isMethod('post')) {
          $data = $request->all();
            //dd($data);
            // if(empty($data['title'])){
            //     return redirect()->back()->with('error_message', 'Title is required !');
            // }

    
    
            if(empty($data['textarea_1']))
            {
                $data['textarea_1'] = "";
            }

            if(empty($data['textarea_2']))
            {
                $data['textarea_2'] = "";
            }


            // if(empty($data['textarea_3']))
            // {
            //     $data['textarea_3'] = "";
            // }

            // if(empty($data['url']))
            // {
            //     $data['url'] = "";
            // }

            if(!empty($data['image'])){
                $image_tmp = $data['image'];
                // dd($image_tmp);
                if($image_tmp->isValid())
                {
                    // get extension
                    $extension = $image_tmp->getClientOriginalExtension();
                    // generate new image name
                    $imageName = rand(111,99999).'.'.$extension;
                    $imagePath = 'images/aboutUs_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $aboutUs->image =$imagePath;
    
                }
            }

            
            // if(!empty($data['image_1'])){
            //     $image_tmp = $data['image_1'];
            //     // dd($image_tmp);
            //     if($image_tmp->isValid())
            //     {
            //         // get extension
            //         $extension = $image_tmp->getClientOriginalExtension();
            //         // generate new image name
            //         $imageName = rand(111,99999).'.'.$extension;
            //         $imagePath = 'images/aboutUs_images/'.$imageName;
            //         $result = Image::make($image_tmp)->save($imagePath);
            //         // dd($result);
            //         $aboutUs->image_1 =$imagePath;
    
            //     }
            // }
    
            $aboutUs->textarea_1 = $data['textarea_1'];
            $aboutUs->textarea_2 = $data['textarea_2'];
            // $aboutUs->textarea_3 = $data['textarea_3'];
            // $aboutUs->url = $data['url'];
            $aboutUs->save();
            Session::flash('success_message', $message);
            return redirect('admin/aboutUs');
        }
        Session::flash('page', 'aboutUs');
        return view('admin.aboutUs.add_edit_aboutUs', compact('title','button','aboutUsdata'));
    }

    public function deleteAboutUsImage($id)
    {
      $aboutUsimage = AboutUs::select('image')->where('id',$id)->first();
      $imagePath = 'images/aboutUs_images/';
      //delete aboutUs image from folder if exists
      if(file_exists($imagePath.$aboutUsimage->image)){
          unlink($imagePath.$aboutUsimage->image);
      }
      //Delete aboutUs image from aboutUss table
      AboutUs::where('id',$id)->update(['image'=>'']);
      return redirect()->back()->with('success_message', 'AboutUs has been deleted successfully!');

    }

    public function deleteAboutUs($id)
    {
      $id =AboutUs::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'AboutUs has been deleted successfully!');

    }
}

