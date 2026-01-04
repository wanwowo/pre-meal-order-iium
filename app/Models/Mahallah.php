<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahallah extends Model
{
    use HasFactory;

    public function cafes(){

    return $this->hasMany(Cafe::class, 'mh_id');
    
    }
}
