<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PageController extends Controller
{

    public function dashboard()
    {
        return view('pages.admin.dashboard');
    }

    public function news()
    {
        return view('pages.admin.news');
    }

    public function about()
    {
        return view('pages.admin.about');
    }

    public function users()
    {
        return view('pages.admin.users');
    }

    public function contact()
    {
        return view('pages.admin.contact');
    }

    public function activity()
    {
        return view('pages.admin.activity');
    }

}
