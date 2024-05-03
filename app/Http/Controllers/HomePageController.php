<?php

namespace App\Http\Controllers;

use App\Models\Tourism;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $tourism = Tourism::all();
        return view('frontend.pages.home-page', compact(['tourism']));
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function services()
    {
        return view('frontend.pages.services');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }
}
