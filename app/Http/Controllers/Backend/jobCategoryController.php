<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

class jobCategoryController extends Controller
{
    public function show()
    {
        return view('backend.pages.job_categories');
    }
     public function create()
    {
        return view('backend.pages.job_category_create');
    }
}
