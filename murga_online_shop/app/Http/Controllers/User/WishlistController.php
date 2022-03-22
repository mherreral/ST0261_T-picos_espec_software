<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = __('messages.wishlist.title');
        $userWishlists = Auth::user()->wishlists->map(
            function ($wishlist) {
                return $wishlist->getId;
            }
        );
        $wishlists = Wishlist::with('customers')->whereIn('id', $userWishlists);
        $viewData["wishlists"] = $wishlists;
        return view('user.wishlist.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $wishlist = Wishlist::findOrFail($id);
        $viewData["title"] = $wishlist->getName();
        return view('user.wishlist.index')->with("viewData", $viewData);
    }

    public function parseCustomerInput($customersText)
    {
        $customersEmail = explode(";", $customersText);
        return $customersEmail;
    }

    public function create(Request $request)
    {
        Wishlist::validate($request);
        $newWishlist = new Wishlist();
        $newWishlist->setName($request->input('name'));
        $customersText = $request->input('customers');
        $customersEmail = parseCustomerInput($customersText);
        $customers = [];

        # Iterate over customers and associate them to wishlist
        for ($i = 0; $i < count($customersEmail); $i++) {
            # Try to find a user registered with the emails
            try {
                $customer = User::where('email', $customersEmail[$i])->get();
            } catch (Exception $e) {
                $error = "Can't find a user registered with some of the given emails";
                return view('user.wishlist.error')->with("error", $error);
            }
            # Add user to customers array
            array_push($customers, $customer);

            #$newWishlist->setCustomers($customer);
        }
        $newWishlist->setCustomers($customers);
        $newWishlist->save();
        return back();
    }
}
