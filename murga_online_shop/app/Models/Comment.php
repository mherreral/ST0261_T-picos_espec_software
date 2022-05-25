<?php

//Authors: Manuela Herrera López

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Liquor;

class Comment extends Model
{
    /**
     * COMMENT ATTRIBUTES
     * $this->attributes['id'] - int - contains the comment primary key (id)
     * $this->attributes['description'] - string - contains the comment description
     * $this->attributes['created_at'] - date - contains the comment creation date 
     * $this->attributes['updated_at'] - date - contains the comment updated date 
     * $this->attributes['score'] - int - contains the score of the liquor
     * $this->attributes['customer'] - User - contains the user related to the comment
     * $this->attributes['liquor'] - Liquor - contains the related liquor
     */
    protected $fillable = [
        'description',
        'score',
    ];

    public static function validate($request)
    {
        $request->validate(
            [
            "description" => "required|string",
            "score" => "required|numeric",
            ]
        );
    }

    public function getId()
    {
        return $this->attributes['id'];
    }

    public function setId($id)
    {
        $this->attributes['id'] = $id;
    }

    public function getDescription()
    {
        return $this->attributes['description'];
    }

    public function setDescription($description)
    {
        $this->attributes['description'] = $description;
    }


    public function getScore()
    {
        return $this->attributes['score'];
    }

    public function setScore($score)
    {
        $this->attributes['score'] = $score;
    }

    public function customer()
    {
        return $this->belongsTo(User::class);
    }

    public function getCustomer()
    {
        return $this->customer();
    }

    public function setCustomer($customer)
    {
        $this->customer_id = $customer;
    }

    public function liquor()
    {
        return $this->belongsTo(Liquor::class);
    }

    public function getLiquor()
    {
        return $this->liquor();
    }

    public function setLiquor($liquor)
    {
        $this->liquor_id = $liquor;
    }

    public function getUpdatedDate()
    {
        return $this->attributes['updated_at'];
    }
    public function SetUpdatedDate($updated_at)
    {
        $this->attributes['updated_at'] = $updated_at;
    }
    public function getCreatedDate()
    {
        return $this->attributes['created_at'];
    }
    public function SetCreatedDate($created_at)
    {
        $this->attributes['created_at'] = $created_at;
    }
}
