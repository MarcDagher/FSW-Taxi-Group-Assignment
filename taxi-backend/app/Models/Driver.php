<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model 
{
    public $timestamps = false;
    use HasFactory;

    protected $primaryKey = 'driver_id';
    protected $fillable=["driver_id","driver_license","age","user_id", "driver_status"];

}
