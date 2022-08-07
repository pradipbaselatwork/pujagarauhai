<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Session;

class ContactController extends Controller
{
    public function addContact(Request $request)
    {
      
            $data = $request->all();
            $contacts = new Contact;
            $contacts->name = $data['name'];
            $contacts->email = $data['email'];
            $contacts->phone = $data['phone'];
            $contacts->address = $data['address'];
            $contacts->description = $data['description'];
            $contacts->save();
            return redirect()->back()->with('success_message', 'Your Message is sent successfully!');
    }
}
