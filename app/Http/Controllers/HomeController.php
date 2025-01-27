<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function aboutUs()
    {
        return view('users.about-us');
    }

    public function contactUs()
    {
        return view('users.contact-us');
    }

    public function services()
    {
        return view('users.services');
    }    
}
