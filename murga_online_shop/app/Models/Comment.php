<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the comment primary key (id)
     * $this->attributes['description'] - string - contains the comment description
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
        $request->validate([
            "description" => "required|string",
            "score" => "required|numeric",
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
    public function liquor()
    {
        return $this->belongsTo(Liquor::class);
    }
}
