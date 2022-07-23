<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Design extends Authenticatable
{
    public function designers(){
        return $this->belongsTo(Designer::class,'designer_id','id');
    }
    public function Orders(){
        return $this->hasMany(Order::class,'design_id','id');
    }
}
