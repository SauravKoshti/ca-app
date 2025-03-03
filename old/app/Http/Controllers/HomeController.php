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
    public function mutualfunds()
    {
        return view('users.mutualfund');
    }

    public function taxation()
    {
        return view('users.taxation');
    }

    public function gst()
    {
        return view('users.gst');
    }

    public function accounting()
    {
        return view('users.accounting');
    }

    public function pancard()
    {
        return view('users.pancard');
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
