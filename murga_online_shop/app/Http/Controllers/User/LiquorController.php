<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Liquor;
use Illuminate\Http\Request;

class LiquorController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData['title'] = __('messages.shop.title');
        $viewData['liquors'] = Liquor::all();
        return view('user.liquor.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $liquor = Liquor::findOrFail($id);
        $loggedUser = Auth::user();
        $userWishlists = [];
        foreach ($loggedUser->wishlists as $wishlist) {
            array_push($userWishlists, $wishlist);
        }
        $viewData['title'] = $liquor->getLiquorType().$liquor->getBrand();
        $viewData['liquor'] = $liquor;
        $viewData['wishlists'] = $userWishlists;
        return view('user.liquor.show')->with("viewData", $viewData);
    }

    public function search(Request $request)
    {
        $viewData = [];
        $viewData['title'] = __('messages.shop.title'); 
        $searchBar = $request->get('searchBar');
        $liquor = Liquor::where('liquor_type','LIKE','%'.$searchBar.'%')->orWhere('brand','LIKE','%'.$searchBar.'%')->get();
        $viewData['liquors'] = $liquor;
        return view('user.liquor.search')->with("viewData", $viewData);
    }
}
