<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Staff;

class IndexController extends Controller
{

    public function index()
    {
        return view(
            'pages.client.index',
            [
                'staff' => Staff::all(),
            ]
        );
    }

}
