<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ride extends Model
{
    use HasFactory;
<<<<<<< HEAD

    protected $primaryKey = "ride_id";
    protected $fillable = [
        'pickup_location',
        'destination_location',
        'status',
        'ride_price',
        'user_id',
        'driver_id',
        'accepted_at'
    ];  
    
=======
>>>>>>> develop
}
