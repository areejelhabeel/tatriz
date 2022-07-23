<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Shop extends Authenticatable

{
    public function designers(){
        return $this->belongsTo(Designer::class,'designer_id','id');
    }
    public function designer_assistants(){
        return $this->belongsTo(DesignerAssistant::class,'designer_assistant_id','id');
    } 
}
