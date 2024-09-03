<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Staff;

class AboutController extends Controller
{
    public function index()
    {
        return view(
            'pages.client.about',
            [
                'staff' => Staff::all(),
            ]
        );
    }
}
