<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['name','payer_email','user_id','membershipType','amount','accepted','order_id'];


}
