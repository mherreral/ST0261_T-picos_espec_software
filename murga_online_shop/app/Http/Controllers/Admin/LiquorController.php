<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Liquor;

class LiquorController extends Controller
{
    public function create()
    {
        $viewData = [];
        $viewData['title'] = __('messages.admin.createLiquors');
        return view('admin.liquor.create')->with("viewData",$viewData);
    }

    public function save(Request $request)
    {
        Liquor::create($request->only(["liquor_type","brand","price","stock","presentation","milliliters","image"]));
        return back()->with("alert", __('messages.admin.saveLiquorsSuccess'));
    }
}
