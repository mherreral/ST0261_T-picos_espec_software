<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Wishlist;
use App\Models\Comment;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * PRODUCT ATTRIBUTES
     * $this->attributes['id'] - int - contains the product primary key (id)
     * $this->attributes['birthDate'] - date - contains the user birthdate
     * $this->attributes['name'] - string - contains the user name
     * $this->attributes['email'] - string - contains the users email
     * $this->attributes['password'] - string - contains the user password
     * $this->attributes['idNumber'] - string - contains the user id card number
     * $this->attributes['availableMoney'] - float - contains the user available money
     * $this->attributes['address'] - string - contains the user address
     * $this->attributes['phoneNumber'] - string - contains the user phone
     * $this->attributes['admin'] - bool - contains the user type
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'birth_date',
        'id_number',
        'address',
        'phone_number',
    ];

    public static function validate($request)
    {
        $request->validate([
            "birth_date" => "required|date|date_format:Y/m/d",
            "name" => "required|string|max:255",
            "email" => "required|string|email|max:255|unique:users",
            "password" => "required|string|min:8|confirmed",
            "id_number" => "required|numeric",
            "address" => "required",
            "phone_number" => "required|numeric",
        ]);
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

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

    public function getEmail()
    {
        return $this->attributes['email'];
    }

    public function setEmail($email)
    {
        $this->attributes['email'] = $email;
    }

    public function getIdNumber()
    {
        return $this->attributes['id_number'];
    }

    public function setIdNumber($id_number)
    {
        $this->attributes['id_number'] = $id_number;
    }

    public function getAvailableMoney()
    {
        return $this->attributes['available_money'];
    }

    public function setAvailableMoney($available_money)
    {
        $this->attributes['available_money'] = $available_money;
    }

    public function getAddress()
    {
        return $this->attributes['address'];
    }

    public function setAddress($address)
    {
        $this->attributes['address'] = $address;
    }

    public function getBirthDate()
    {
        return $this->attributes['birth_date'];
    }

    public function setBirthDate($birth_date)
    {
        $this->attributes['birth_date'] = $birth_date;
    }

    public function getPhoneNumber()
    {
        return $this->attributes['phone_number'];
    }

    public function setPhoneNumber($phone_number)
    {
        $this->attributes['phone_number'] = $phone_number;
    }

    public function getAdmin()
    {
        return $this->attributes['admin'];
    }

    public function setAdmin($admin)
    {
        $this->attributes['admin'] = $admin;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function getComments()
    {
        return $this->comments;
    }

    public function setComments($comments)
    {
        $this->comments = $comments;
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function getWishlists()
    {
        return $this->wishlists;
    }

    public function setWishlists($wishlists)
    {
        $this->wishlists = $wishlists;
    }
}
