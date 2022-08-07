<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\Contact;

class ContactController extends Controller
{
    public function contact()
    {
        $contact = Contact::get();
        Session::flash('page', 'contact');
        return view('admin.contact.view_contact', compact('contact'));
    }
}
