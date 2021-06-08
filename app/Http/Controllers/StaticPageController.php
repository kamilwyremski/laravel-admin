<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\StaticPage;
use Illuminate\Http\Request;

class StaticPageController extends Controller
{
    public function show(StaticPage $StaticPage)
    {
        return view('static_page.show', ['static_page' => $StaticPage]);
    }
}
