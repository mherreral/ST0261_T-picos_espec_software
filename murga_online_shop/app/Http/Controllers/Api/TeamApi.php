<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class TeamApi extends Controller
{
    public function index(Request $request)
    {
        $viewData = [];
        $viewData["title"] = __('messages.teamApi.title');
        $beers = Http::get('http://thecraftbeer.tk/api/v1/beers')->json();

        return view('user.api.index', compact('beers'))->with("viewData", $viewData);
    }
}
