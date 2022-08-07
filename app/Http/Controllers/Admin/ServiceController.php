<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Service;
use App\ServiceType;
use Image;

class ServiceController extends Controller
{
    public function Service()
    {
        $service = Service::with('serviceType')->get();
        Session::flash('page', 'service');
        return view('admin.service.view_service', compact('service'));
    }

    public function addEditService(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Service";
            $button ="Submit";
            $service = new Service;
            $servicedata = array();
            $message = "Service has been added sucessfully!";
        }else{
            $title = "Edit Service";
            $button ="Update";
            $service = Service::where('id',$id)->first();
            $servicedata= json_decode(json_encode($service),true);
            $service = Service::find($id);
            $message = "Service has been updated sucessfully!";
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

            if(empty($data['meta_title']))
            {
                $data['meta_title'] = "";
            }
            
            if(empty($data['meta_description']))
            {
                $data['meta_description'] = "";
            }

            if(empty($data['url']))
            {
                $data['url'] = "";
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
                    $imagePath = 'images/service_images/'.$imageName;
                    $result = Image::make($image_tmp)->save($imagePath);
                    // dd($result);
                    $service->image =$imagePath;
    
                }
            }

            // if(!empty($data['image_2'])){
            //     $image_tmp = $data['image_2'];
            //     // dd($image_tmp);
            //     if($image_tmp->isValid())
            //     {
            //         // get extension
            //         $extension = $image_tmp->getClientOriginalExtension();
            //         // generate new image name
            //         $imageName = rand(111,99999).'.'.$extension;
            //         $imagePath= 'images/service_images/'.$imageName;
            //         $result = Image::make($image_tmp)->save($imagePath);
            //         // dd($result);
            //         $service->image_2 =$imagePath;
    
            //     }
            // }

            // if(!empty($data['image_3'])){
            //     $image_tmp = $data['image_3'];
            //     // dd($image_tmp);
            //     if($image_tmp->isValid())
            //     {
            //         // get extension
            //         $extension = $image_tmp->getClientOriginalExtension();
            //         // generate new image name
            //         $imageName = rand(111,99999).'.'.$extension;
            //         $imagePath= 'images/service_images/'.$imageName;
            //         $result = Image::make($image_tmp)->save($imagePath);
            //         // dd($result);
            //         $service->image_3 =$imagePath;
    
            //     }
            // }


            $service->title = $data['title'];
            $service->servicetype_id = $data['servicetype_id'];
            $service->description = $data['description'];
            $service->url = $data['url'];
            // $service->img2_description = $data['img2_description'];
            // $service->img3_description = $data['img3_description'];
            $service->meta_title = $data['meta_title'];
            $service->meta_description = $data['meta_description'];
            $service->meta_keywords = $data['meta_keywords'];
            $service->save();
            Session::flash('success_message', $message);
            return redirect('admin/service');
        }

        $serviceType = ServiceType::get();
        Session::flash('page', 'service');
        return view('admin.service.add_edit_service', compact('title','button','servicedata','serviceType'));
    }

    public function deleteServiceImage($id)
    {
      $serviceimage = Service::select('image')->where('id',$id)->first();
      $imagePath = 'images/service_images/';
      //delete service image from folder if exists
      if(file_exists($imagePath.$serviceimage->image)){
          unlink($imagePath.$serviceimage->image);
      }
      //Delete service image from services table
      Service::where('id',$id)->update(['image'=>'']);
      return redirect()->back()->with('success_message', 'Service has been deleted successfully!');

    }


    public function deleteService($id)
    {
      $id =Service::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Service has been deleted successfully!');

    }
}
