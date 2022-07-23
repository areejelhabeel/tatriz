<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Designer extends Authenticatable{

    public function shop(){
        return $this->haseOne(Shop::class,'designer_id','id');
    }
    public function design(){
        return $this->haseMany(Design::class,'designer_id','id');
    }
    public function designer_assistant(){
        return $this->hasOne(DesignerAssistant::class,'designer_id','id');
    }
    public function order(){
        return $this->haseMany(Order::class,'designer_id','id');
    }
    public function piggybank(){
        return $this->haseMany(piggybank::class,'designer_id','id');
    }
}
