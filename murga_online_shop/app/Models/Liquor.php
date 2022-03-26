<?php

//Authors: Manuela Herrera López

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Liquor extends Model
{
    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['liquorType'] - string - contains the liquor Type (beer, ect)
     * $this->attributes['brand'] - string - contains the liquor brand (Caldas, etc)
     * $this->attributes['price'] - float - contains the liquor price
     * $this->attributes['stock'] - int - contains the liquor stock (default 50)
     * $this->attributes['presentation'] - string - contains the liquor presentation (sixpack, etc)
     * $this->attributes['milliliters'] - int - contains the liquor milliliters
     * $this->attributes['image'] - string - contains the localization of liquor image
     * $this->attributes['items'] - Item[] - contains a list of items
     * $this->attributes['comments'] - Comment[] - contains a list of comments
     */

    protected $fillable = [
        'liquor_type',
        'brand',
        'price',
        'stock',
        'presentation',
        'milliliters',
        'image'
    ];

    public static function validate($request)
    {
        $request->validate([
            "liquor_type" => "required|string",
            "brand" => "required|string",
            "price" => "required|numeric|gt:0",
            "stock" => "required|numeric",
            "presentation" => "required|string",
            "milliliters" => "required|int",
            "image" => "required|string"
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

    public function getLiquorType()
    {
        return $this->attributes['liquor_type'];
    }

    public function setLiquorType($liquor_type)
    {
        $this->attributes['liquor_type'] = $liquor_type;
    }

    public function getBrand()
    {
        return $this->attributes['brand'];
    }

    public function setBrand($brand)
    {
        $this->attributes['brand'] = $brand;
    }

    public function getPrice()
    {
        return $this->attributes['price'];
    }

    public function setPrice($price)
    {
        $this->attributes['price'] = $price;
    }

    public function getStock()
    {
        return $this->attributes['stock'];
    }

    public function setStock($stock)
    {
        $this->attributes['stock'] = $stock;
    }

    public function getPresentation()
    {
        return $this->attributes['presentation'];
    }

    public function setPresentation($presentation)
    {
        $this->attributes['presentation'] = $presentation;
    }

    public function getMilliliters()
    {
        return $this->attributes['milliliters'];
    }

    public function setMilliliters($milliliters)
    {
        $this->attributes['milliliters'] = $milliliters;
    }

    public function getImage()
    {
        return $this->attributes['image'];
    }

    public function setImage($image)
    {
        $this->attributes['image'] = $image;
    }

    public function items()
    {
        return $this->hasMany(Item::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
