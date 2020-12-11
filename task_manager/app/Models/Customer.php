<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    function roles(){
        return $this->belongsToMany(Role::class,'role_customer','customer_id','role_id');
    }
}
