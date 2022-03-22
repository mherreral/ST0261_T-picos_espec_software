<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['link'] - string - contains the wishlist link
     * $this->attributes['name'] - string - contains the wishlist name
     * $this->attributes['customers'] - customer[] - contains the owners of the wishlist
     * $this->attributes['items'] - item[] - contains the related items
     * $this->attributes['shoppingCart'] - shoppingCart - contains the shoppingcart associated
     */
    protected $fillable = [
        'name',
    ];

    public static function validate($request)
    {
        $request->validate([
            "name" => "required|string|max:255",
        ]);
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getLink()
    {
        return $this->attributes['link'];
    }

    public function setLink($link)
    {
        $this->attributes['link'] = $link;
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
        return $this->hasMany(User::class);
    }
    public function items()
    {
        return $this->hasMany(Item::class);
    }
}
