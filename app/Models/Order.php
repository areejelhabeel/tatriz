<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Order extends Authenticatable
{
    public function designs(){
        return $this->belongsTo(Design::class,'design_id','id');
    }
    public function designers(){
        return $this->belongsTo(Designer::class,'designer_id','id');
    }
    public function customers(){
        return $this->belongsTo(Customer::class,'customer_id','id');
    }
}
