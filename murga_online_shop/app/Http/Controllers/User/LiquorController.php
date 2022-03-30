<?php

//Authors: Manuela Herrera López

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Liquor;
use App\Models\Comment;
use Illuminate\Http\Request;

class LiquorController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = __('messages.shop.title');
        $viewData["liquors"] = Liquor::all();
        $viewData["liquorTypes"] = Liquor::distinct()->orderBy('liquor_type', 'asc')->get('liquor_type');
        return view('user.liquor.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $liquor = Liquor::where('id', $id)->with('comments')->get()[0];
        $loggedUser = Auth::user();
        $userWishlists = [];
        foreach ($loggedUser->wishlists as $wishlist) {
            array_push($userWishlists, $wishlist);
        }
        $viewData["title"] = $liquor->getLiquorType() . $liquor->getBrand();
        $viewData["liquor"] = $liquor;
        $comments = $liquor->getComments();
        $viewData["comments"] = $comments;
        if ($comments->count() > 1) {
            $mean = $comments->sum('score') / $comments->count();
            $viewData["mean"] = round($mean, 1);
        } else {
            $viewData["mean"] = 0;
        }
        $viewData["wishlists"] = $userWishlists;
        return view('user.liquor.show')->with("viewData", $viewData);
    }

    public function search(Request $request)
    {
        $viewData = [];
        $viewData["title"] = __('messages.shop.title');

        $searchBar = $request->post('searchBar');
        $orderBy = $request->post('orderBy');
        $liquorType = $request->post('liquorType');
        if ($liquorType == 'NA') {
            $liquors = Liquor::where('liquor_type', 'LIKE', '%' . $searchBar . '%')->orWhere('brand', 'LIKE', '%' . $searchBar . '%')->orderBy('price', $orderBy)->get();
        } else if ($searchBar == '') {
            $liquors = Liquor::where('liquor_type', "$liquorType")->orderBy('price', $orderBy)->get();
        } else {
            $liquors = Liquor::where('liquor_type', "$liquorType")->orWhere('brand', 'LIKE', '%' . $searchBar . '%')->orderBy('price', $orderBy)->get();
        }
        $viewData["liquors"] = $liquors;
        $viewData["liquorTypes"] = Liquor::distinct()->orderBy('liquor_type', 'asc')->get('liquor_type');

        return view('user.liquor.index')->with("viewData", $viewData);
    }
}
