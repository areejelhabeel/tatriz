<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;


class DesignerAssistant extends  Authenticatable
{
    public function designers(){
        return $this->belongsTo( Designer::class,'designer_id','id');
    }
    public function shop(){
        return $this->haseOne(shop::class,'designer_assistant_id','id');
    }
}
