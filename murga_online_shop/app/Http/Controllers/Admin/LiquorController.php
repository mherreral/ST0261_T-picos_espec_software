<?php

//Authors: Ana Arango, Manuela Herrera

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Liquor;

class LiquorController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = __('messages.shop.title');
        $viewData["liquors"] = Liquor::all();
        return view('admin.liquor.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $liquor = Liquor::findOrFail($id);
        $viewData["title"] = $liquor->getLiquorType() . $liquor->getBrand();
        $viewData["liquor"] = $liquor;
        return view('admin.liquor.show')->with("viewData", $viewData);
    }

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

    public function delete($id)
    {
        $liquor = Liquor::findOrFail($id);
        $liquor->delete();
        return redirect()->route("admin.liquor.index")->with("alert", __('messages.admin.deleteLiquorsSuccess'));
    }

    public function edit($id)
    {
        $viewData = [];
        $liquor = Liquor::findOrFail($id);
        $viewData["title"] = __('messages.admin.editeLiquors');
        $viewData["liquor"] = $liquor;
        return view('admin.liquor.edit')->with("viewData", $viewData);
    }

    public function update(Request $request, $id)
    {
        $liquor = Liquor::findOrFail($id);
        $liquor->setPrice($request->price);
        $liquor->setStock($request->stock);
        $liquor->save();

        if ($request->hasFile('image')) {
            $imageName = $liquor->getId() . "." . $request->file('image')->extension();
            $image = $request->file('image');
            $image->move('img', $imageName);
            $liquor->setImage($imageName);
            $liquor->save();
        }
        return redirect()->route("admin.liquor.index")->with("alert", __('messages.admin.updateLiquorsSuccess'));
    }
}
