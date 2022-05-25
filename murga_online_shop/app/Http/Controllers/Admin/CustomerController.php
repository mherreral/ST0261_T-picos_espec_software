<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Interfaces\ImageStorage;


class CustomerController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = __('messages.admin.customer.manage');
        $viewData["customers"] = User::all();
        return view('admin.customer.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $customer = User::find($id);
        if ($customer !== null) {
            $customer = User::findOrFail($id);
            $viewData["title"] = $customer->getName() . __('messages.admin.customer.showTitle');
            $viewData["picture"] = 'storage/' . $customer->getName() . $customer->getId() . '.png';
            $viewData["customer"] = $customer;
            return view('admin.customer.show')->with("viewData", $viewData);
        } else {
            return redirect()->action([HomeController::class, 'index']);
        }
    }

    public function setAdmin()
    {
        $viewData = [];
        $viewData["title"] = __('messages.admin.customer.setAdminTitle');
        $viewData["customers"] = User::all();
        return view('admin.customer.setAdmin')->with("viewData", $viewData);
    }

    public function delete()
    {
        $viewData = [];
        $viewData["title"] = __('messages.admin.customer.deleteTitle');
        $viewData["customers"] = User::all();
        return view('admin.customer.delete')->with("viewData", $viewData);
    }


    public function save(Request $request)
    {
        $viewData = [];
        $viewData["title"] = __('messages.admin.customer.saveTitle');
        $viewData["subtitle"] = __('messages.admin.customer.saveSubTitle');;

        if ($request->has("adminFlag")) {
            $request = $request->only(["adminId", "adminFlag"]);
            $user = User::findOrFail($request["adminId"]);
            $user->update(["admin" => $request["adminFlag"]]);
        } else if ($request->has("deleteId")) {
            $request = $request->only(["deleteId"]);
            $user = User::findOrFail($request["deleteId"]);
            $user->delete();
        } else if ($request->has("storage")) {
            $storage = $request->get('storage');
            $storeInterface = app(ImageStorage::class, ['storage' => $storage]);
            $storeInterface->store($request);
        }

        return view('admin.customer.save')->with("viewData", $viewData);
    }
}
