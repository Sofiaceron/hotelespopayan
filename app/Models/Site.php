<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;
    public function Servicio(){
        $this->hasMany(Service::class,'id_sites','id');
    }
}
