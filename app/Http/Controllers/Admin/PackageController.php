<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Package;
use App\PackageType;
use Image;

class PackageController extends Controller
{
    public function Package()
    {
         $package = Package::with('packageType')->get();
           //echo "<pre>"; print_r($package); die; 
        Session::flash('page', 'package');
        return view('admin.package.view_package', compact('package'));
    }

    public function addEditPackage(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Package";
            $button ="Submit";
            $package = new Package;
            $packagedata = array();
            $message = "Package has been added sucessfully!";
        }else{
            $title = "Edit Package";
            $button ="Update";
            $package = Package::where('id',$id)->first();
            $packagedata= json_decode(json_encode($package),true);
            $package = Package::find($id);
            $message = "Package has been updated sucessfully!";
        }
        if($request->isMethod('post')) {
          $data = $request->all();
            //dd($data);
            if(empty($data['title'])){
                return redirect()->back()->with('error_message', 'Title is required !');
            }
    
            if(empty($data['description']))
            {
                $data['description'] = "";
            }

            
            if(empty($data['url']))
            {
                $data['url'] = "";
            }

            if(empty($data['price']))
            {
                $data['price'] = "";
            }

            if(empty($data['meta_title']))
            {
                $data['meta_title'] = "";
            }
            
            if(empty($data['best_price']))
            {
                $data['best_price'] = "";
            }
            
            
            if(empty($data['call_support']))
            {
                $data['call_support'] = "";
            }
            
            if(empty($data['call_description']))
            {
                $data['call_description'] = "";
            }
            
            if(empty($data['best_description']))
            {
                $data['best_description'] = "";
            }
            

            if(empty($data['meta_description']))
            {
                $data['meta_description'] = "";
            }

            if(empty($data['meta_keywords']))
            {
                $data['meta_keywords'] = "";
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
                    $imagePath = 'images/package_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $package->image =$imagePath;
    
                }
            }
            $package->title = $data['title'];
            $package->price = $data['price'];
            $package->packagetype_id = $data['packagetype_id'];
            // $package->offer = $data['offer'];
            $package->description = $data['description'];
            $package->url = $data['url'];
            $package->best_price = $data['best_price'];
            // $package->hotel_meals = $data['hotel_meals'];
            $package->call_support = $data['call_support'];
            $package->best_description = $data['best_description'];
            // $package->hotel_description = $data['hotel_description'];
            $package->call_description = $data['call_description'];
            $package->meta_title = $data['meta_title'];
            $package->meta_description = $data['meta_description'];
            $package->meta_keywords = $data['meta_keywords'];
            $package->save();
            Session::flash('success_message', $message);
            return redirect('admin/package');
        }

        $packagetype = PackageType::get();
        Session::flash('page', 'package');
        return view('admin.package.add_edit_package', compact('title','button','packagedata','packagetype'));
    }

    public function deletePackageImage($id)
    {
      $packageimage = Package::select('image')->where('id',$id)->first();
      $imagePath = 'images/package_images/';
      //delete package image from folder if exists
      if(file_exists($imagePath.$packageimage->image)){
          unlink($imagePath.$packageimage->image);
      }
      //Delete package image from packages table
      package::where('id',$id)->update(['image'=>'']);
      return redirect()->back()->with('success_message', 'Package has been deleted successfully!');

    }


    public function deletePackage($id)
    {
      $id =Package::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Package has been deleted successfully!');

    }
}
