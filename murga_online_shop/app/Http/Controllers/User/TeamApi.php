<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class TeamApi extends Controller
{
    public function index(Request $request)
    {
        $viewData = [];
        $viewData["title"] = __('messages.teamApi.title');
        $viewData["beers"] = Http::get('http://thecraftbeer.tk/api/v1/beers')->json()["data"];

        return view('user.teamApi.index')->with("viewData", $viewData);
    }
}
