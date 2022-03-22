<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the item primary key (id)
     * $this->attributes['subtotal'] - float - contains the item subtotal (quantity*price)
     * $this->attributes['quantity'] - int - contains liquor quantity
     * $this->attributes['liquor'] - liquor - contains the related liquor
     * $this->attributes['wishlist'] - Wishlist - contains the related wishlist
     */
    protected $fillable = [
        'quantity',
    ];

    public static function validate($request)
    {
        $request->validate([
            "quantity" => "required|numeric|gt:0",
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

    public function getSubtotal()
    {
        return $this->attributes['subtotal'];
    }

    public function setSubtotal($subtotal)
    {
        $this->attributes['subtotal'] = $subtotal;
    }

    public function getQuantity()
    {
        return $this->attributes['quantity'];
    }

    public function setQuantity($quantity)
    {
        $this->attributes['quantity'] = $quantity;
    }

    public function liquor()
    {
        return $this->belongsTo(Liquor::class);
    }
    public function wishlist()
    {
        return $this->belongsTo(Wishlist::class);
    }
}
