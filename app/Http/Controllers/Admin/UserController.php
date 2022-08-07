<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Session;

class UserController extends Controller
{
    public function users()
    {
        $users = User::get();
        Session::flash('page', 'users');
        return view('admin.showorder.users', compact('users'));
    }
}
