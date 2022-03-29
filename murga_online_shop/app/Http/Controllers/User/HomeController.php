<?php

//Authors: Manuela Herrera López

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = __('messages.home.title');
        return view('user.home.index')->with('viewData', $viewData);
    }
}
