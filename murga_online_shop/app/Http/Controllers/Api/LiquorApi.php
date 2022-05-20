<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Liquor;

class LiquorApi extends Controller
{
    public function index()
    {
        return Liquor::all();
    }

    public function show($id)
    {
        return Liquor::findOrFail($id);
    }
}
