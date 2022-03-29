<?php

//Authors: Manuela Herrera López

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Item;
use App\Models\User;

class Wishlist extends Model
{
    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['link'] - string - contains the wishlist link
     * $this->attributes['name'] - string - contains the wishlist name
     * $this->attributes['customers'] - customer[] - contains users that share the wishlist
     * $this->attributes['items'] - item[] - contains the related items
     * $this->attributes['shoppingCart'] - shoppingCart - contains the shoppingcart associated
     */
    protected $fillable = [
        'name',
        'customers',
    ];

    public static function validate($request)
    {
        $request->validate([
            "name" => "required|string|max:255",
        ]);
    }

    public static function getWishlistTotal($wishlistsInCart)
    {
        $total = 0;
        foreach ($wishlistsInCart as $wishlist) {
            foreach ($wishlist->items as $item) {
                $total = $total + $item->getSubtotal();
            }
        }
        return $total;
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getName()
    {
        return $this->attributes['name'];
    }

    public function setName($name)
    {
        $this->attributes['name'] = $name;
    }

    public function customers()
    {
        return $this->belongsToMany(User::class);
    }

    public function getCustomers()
    {
        return $this->customers;
    }

    public function setCustomers($customers)
    {
        $this->customers = $customers;
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setItems($items)
    {
        $this->items = $items;
    }
}
