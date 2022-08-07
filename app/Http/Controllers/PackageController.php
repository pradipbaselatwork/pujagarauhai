<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
class PackageController extends Controller
{
    public function PackageDetail($id)
    {
       $package= Package::where('id', $id)->first();
       $packageget= Package::where('id','!=', $id)->where('packagetype_id', $package->packagetype_id)->get();
        return view('front.package_detail', compact('package','packageget'));
    }
}
