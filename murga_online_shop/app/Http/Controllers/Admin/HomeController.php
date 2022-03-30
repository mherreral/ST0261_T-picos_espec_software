<?php

//Authors: Manuela Herrera López

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = __('messages.admin.title');
        return view('admin.home.index')->with("viewData", $viewData);
    }
}
