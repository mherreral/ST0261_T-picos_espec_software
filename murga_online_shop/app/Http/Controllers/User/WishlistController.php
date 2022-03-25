<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $viewData = [];
        $viewData["title"] = __('messages.wishlist.title');
        $loggedUser = Auth::user();
        $userWishlists = [];
        foreach ($loggedUser->wishlists as $wishlist) {
            array_push($userWishlists, $wishlist);
        }
        $viewData["wishlists"] = $userWishlists;
        return view('user.wishlist.index')->with("viewData", $viewData);
    }

    public function show($id)
    {
        $viewData = [];
        $wishlist = Wishlist::findOrFail($id);
        $viewData["title"] = $wishlist->getName();
        $viewData["wishlist"] = $wishlist;
        return view('user.wishlist.show')->with("viewData", $viewData);
    }

    public function parseCustomerInput($customersText)
    {
        $customersEmail = explode(";", $customersText);
        return $customersEmail;
    }

    public function create()
    {
        $viewData["title"] = __('messages.wishlist.create');
        return view('user.wishlist.create')->with("viewData", $viewData);
    }

    public function save(Request $request)
    {
        Wishlist::validate($request);
        $newWishlist = new Wishlist();
        $newWishlist->setName($request->input('name'));
        $newWishlist->save();

        $wishlistId = $newWishlist->getId();
        $customersText = $request->input('customers');
        //$customers = [];

        if (strlen($customersText) != 0) {
            # Add wishlist creator as owner
            $customersEmail = $this->parseCustomerInput($customersText);
            $userEmail = Auth::user()->getEmail();
            array_push($customersEmail, $userEmail);

            # Iterate over customers and associate them to wishlist
            for ($i = 0; $i < count($customersEmail); $i++) {
                # Try to find a user registered with the emails
                $customer = User::where('email', $customersEmail[$i])->get();
                if ($customer->isEmpty()) {
                    $error = __('messages.wishlist.email.error');
                    return view('user.wishlist.error')->with("error", $error);
                }
                # Add user to customers array
                $newWishlist = Wishlist::find($wishlistId);
                $newWishlist->customers()->attach($customer);
            }
        } else {
            $customer = Auth::user();
            $newWishlist->setCustomers($customer);
        }

        return redirect('/');
    }

    public function delete($id)
    {
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();
        return redirect('/');
    }
}
