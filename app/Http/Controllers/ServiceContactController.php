<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceContact;

class ServiceContactController extends Controller
{
    public function addServiceContact(Request $request)
    {
      
            $data = $request->all();
            $serviceContact = new ServiceContact;
            $serviceContact->title = $data['title'];
            $serviceContact->name = $data['name'];
            $serviceContact->email = $data['email'];
            $serviceContact->phone = $data['phone'];
            $serviceContact->address = $data['address'];
            $serviceContact->sex = $data['sex'];
            // $serviceContact->age = $data['age'];
            $serviceContact->booking_date = $data['booking_date'];
            $serviceContact->description = $data['description'];
            $serviceContact->save();
            return redirect()->back()->with('success_message', 'Message sent successfully!');
    }
}
