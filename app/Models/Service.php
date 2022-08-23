<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    public function Sitio(){
        $this->belongsTo(Site::class, 'sitio_id','id');
    }
}
