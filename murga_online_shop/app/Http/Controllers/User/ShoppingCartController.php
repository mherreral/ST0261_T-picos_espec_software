<?php

//Authors: Manuela Herrera López

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function index(Request $request)
    {
        $total = 0;
        $wishlistsInCart = [];

        $wishlistsInSession = $request->session()->get("wishlists");
        if ($wishlistsInSession) {
            $wishlistsInCart = Wishlist::findMany(array_keys($wishlistsInSession));
            $total = Wishlist::getWishlistTotal($wishlistsInCart);
        }

        $viewData = [];
        $viewData["title"] = __('messages.shoppingCart.title');
        $viewData["total"] = $total;
        $viewData["wishlists"] = $wishlistsInCart;
        return view('user.shoppingCart.index')->with("viewData", $viewData);
    }

    public function add(Request $request, $id)
    {
        $wishlists = $request->session()->get("wishlists");
        $wishlists[$id] = $id;
        $request->session()->put('wishlists', $wishlists);

        return redirect()->route('user.shoppingCart.index');
    }

    public function delete(Request $request)
    {
        $request->session()->forget('wishlists');
        return back();
    }

    public function purchase(Request $request)
    {
        $wishlistsInCart = [];
        $wishlistsInSession = $request->session()->get("wishlists");
        if ($wishlistsInSession) {
            $loggedUser = Auth::user();
            $viewData = [];
            $viewData["title"] = __('messages.shoppingCart.purchase');
            $viewData["message"] = __('messages.shoppingCart.aux');
            $wishlistsInCart = Wishlist::findMany(array_keys($wishlistsInSession));
            $total = Wishlist::getWishlistTotal($wishlistsInCart);

            //Reduce liquor stock
            foreach ($wishlistsInCart as $wishlist) {
                foreach ($wishlist->items as $item) {
                    $liquorItem = $item->liquor;
                    $quantity = $item->getQuantity();
                    $currentStock = $liquorItem->getStock();

                    //Check if we can do the purchase
                    if ($currentStock >= $quantity) {
                        $newStock = $currentStock - $quantity;
                        $liquorItem->setStock($newStock);
                        $liquorItem->save();
                    } else {
                        $error = __('messages.shoppingCart.error.outOfStock');
                        return view('user.shoppingCart.error')->with("error", $error);
                    }
                }
            }
            //Update user available money
            if ($loggedUser->getAvailableMoney() >= $total) {
                $availableMoney = $loggedUser->getAvailableMoney() - $total;
                $loggedUser->setAvailableMoney($availableMoney);
                $loggedUser->save();
                $viewData["message"] = __('messages.shoppingCart.success');
            } else {
                $viewData["message"] = __('messages.shoppingCart.error');
            }

            $request->session()->forget('wishlists');

            return view('user.shoppingCart.purchase')->with("viewData", $viewData);
        } else {
            return redirect()->route('user.shoppingCart.index');
        }
    }
}
