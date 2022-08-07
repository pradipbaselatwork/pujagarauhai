<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\ServiceContact;

class ServiceContactController extends Controller
{
    public function ServiceContact()
    {
        $serviceContact = ServiceContact::get();
        Session::flash('page', 'serviceContact');
        return view('admin.serviceContact.view_serviceContact', compact('serviceContact'));
    }
}
