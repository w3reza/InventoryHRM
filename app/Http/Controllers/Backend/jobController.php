<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class jobController extends Controller
{
    public function show()
    {
        return view('backend.pages.jobs');
    }
     public function create()
    {
        return view('backend.pages.job_create');
    }
}
