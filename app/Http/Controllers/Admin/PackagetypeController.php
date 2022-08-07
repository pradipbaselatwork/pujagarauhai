<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\PackageType;

class PackagetypeController extends Controller
{
    public function Packagetype()
    {
         $packagetype = PackageType::get();
           //echo "<pre>"; print_r($packagetype); die; 
        Session::flash('page', 'packagetype');
        return view('admin.packagetype.view_packagetype', compact('packagetype'));
    }

    public function addEditPackagetype(Request $request, $id=null)
    {
        if($id=="") {
            $title = "Add Package Type";
            $button ="Submit";
            $packagetype = new PackageType;
            $packagetypedata = array();
            $message = "Package Type has been added sucessfully!";
        }else{
            $title = "Edit Package Type";
            $button ="Update";
            $packagetype = PackageType::where('id',$id)->first();
            $packagetypedata= json_decode(json_encode($packagetype),true);
            $packagetype = PackageType::find($id);
            $message = "Package Type has been updated sucessfully!";
        }
        if($request->isMethod('post')) {
          $data = $request->all();

          //validation is here
          $rules = [
            'package_type' => 'required',
        ];

        $customMessages = [
            'package_type.required' => 'Package Type is required',
        ];

        $this->validate($request,$rules,$customMessages);
        
       
            $packagetype->package_type = $data['package_type'];
            $packagetype->save();
            Session::flash('success_message', $message);
            return redirect('admin/packagetype');
        }
        Session::flash('page', 'packagetype');
        return view('admin.packagetype.add_edit_packagetype', compact('title','button','packagetypedata'));
    }

    public function deletePackagetype($id)
    {
      $id =PackageType::find($id);
      $id->delete();
      return redirect()->back()->with('success_message', 'Package Type has been deleted successfully!');

    }
}
