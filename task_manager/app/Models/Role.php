<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    function customers()
    {
        return $this->belongsToMany(Customer::class,'role_customer','role_id','customer_id');
    }
}
