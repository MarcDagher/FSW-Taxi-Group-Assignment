<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

<<<<<<< HEAD
    protected $primaryKey = "user_id";
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'img',
        'role_id'
=======
    
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'role_id',
>>>>>>> Drivers-CRUD
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getJWTIdentifier()
    {
<<<<<<< HEAD
        return $this->user_id;
=======
        return $this->user_id; 
>>>>>>> Drivers-CRUD
    }

    public function getJWTCustomClaims()
    {
        return [
<<<<<<< HEAD
            'user_id' => $this->user_id,
=======
            'user_id' => $this->user_id
>>>>>>> Drivers-CRUD
        ];
    }

}