<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CustomerController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = "Admin - Customer";
        $viewData["subtitle"] = "List of customers";
        $viewData["customers"] = User::all();
        return view('admin.customer.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $aux = $id - 1;
        if ($aux <= User::count()) {
            $customer = User::findOrFail($id);
            $viewData["title"] = $customer["name"] . " - Online Store";
            $viewData["subtitle"] = $customer["name"] . " - Customer information";
            $viewData["picture"] = "https://upload.wikimedia.org/wikipedia/commons/9/99/Sample_User_Icon.png";
            $viewData["customer"] = $customer;
            return view('admin.customer.show')->with("viewData", $viewData);
        } else {
            return redirect()->action([HomeController::class, 'index']);
        }
    }

    public function setAdmin()
    {
        $viewData = [];
        $viewData["title"] = "Set admin customer";
        $viewData["customers"] = User::all();
        return view('admin.customer.setAdmin')->with("viewData", $viewData);
    }

    public function delete()
    {
        $viewData = [];
        $viewData["title"] = "Delete customer";
        $viewData["customers"] = User::all();
        return view('admin.customer.delete')->with("viewData", $viewData);
    }

    public function save(Request $request)
    {
        if ($request->has("adminFlag")) {
            $request = $request->only(["adminId", "adminFlag"]);
            $user = User::findOrFail($request["adminId"]);
            $user->update(["admin" => $request["adminFlag"]]);
        } else if ($request->has("deleteId")) {
            $request = $request->only(["deleteId"]);
            $user = User::findOrFail($request["deleteId"]);
            $user->delete();
        }

        return view('admin.customer.save');
    }
}
