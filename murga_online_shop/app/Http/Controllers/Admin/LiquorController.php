<?php

//Authors: Ana Arango, Manuela Herrera

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Liquor;

class LiquorController extends Controller
{
    public function create()
    {
        $viewData = [];
        $viewData["title"] = __('messages.admin.createLiquors');
        return view('admin.liquor.create')->with("viewData", $viewData);
    }

    public function save(Request $request)
    {
        $liquor = new Liquor();
        $liquor->setLiquorType($request->liquor_type);
        $liquor->setBrand($request->brand);
        $liquor->setPrice($request->price);
        $liquor->setStock($request->stock);
        $liquor->setPresentation($request->presentation);
        $liquor->setMilliliters($request->milliliters);
        $liquor->save();

        if ($request->hasFile('image')) {
            $imageName = $liquor->getId() . "." . $request->file('image')->extension();
            $image = $request->file('image');
            $image->move('img', $imageName);
            $liquor->setImage($imageName);
            $liquor->save();
        }
        return back()->with("alert", __('messages.admin.saveLiquorsSuccess'));
    }
}
