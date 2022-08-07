<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\ServiceType;

class ServiceController extends Controller
{
    public function ServiceDetail($id)
    {
        $service= Service::where('id', $id)->first();
        return view('front.service_detail', compact('service'));
    }
    public function ServiceType($id)
    {
        $service = Service::where('servicetype_id', $id)->get();
        $serviceType= ServiceType::get();
        return view('front.service',compact('service', 'serviceType'));
    }

    public function bookService($id)
    {
        $service= Service::where('id', $id)->first();
        return view('front.bookservice',compact('service'));
    }
}
