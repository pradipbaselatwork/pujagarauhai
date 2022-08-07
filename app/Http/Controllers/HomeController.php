<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Banner;
use App\Package;
use App\Service;
use App\AboutUs;
use App\Contact;
use App\User;
use App\Bannerimage;
use App\PackageType;
use App\ServiceType;

class HomeController extends Controller
{
    
    public function index()
    {
        $bannerimage= Bannerimage::get();
        $package= Package::limit(4)->get();
        $service= Service::get();
        return view('front.home', compact('bannerimage','package','service'));
    }

    public function nav($url=null, $id=null)
    {
        if($url == "aboutus")
        {
            $aboutus= AboutUs::get();
            return view('front.aboutus',compact('aboutus'));
        }

        if($url == "packages")
        {
            $packages= PackageType::with('package')->get();
            return view('front.package',compact('packages'));
        }

        if($url == "services")
        {
            // return $id;
            $serviceType = ServiceType::get();
            $service= Service::get();
            return view('front.service',compact('service', 'serviceType'));
        }

        if($url == "contactus")
        {
            $contact= Contact::get();
            return view('front.contact',compact('contact'));
        }

        if($url == "login")
        {
            $user= User::get();
            return view('front.login',compact('user'));
        }

    }
    
    public function terms()
    {
        return view('front.terms');
    }
    
      public function privacy()
    {
        return view('front.privacy');
    }
    
    

}
