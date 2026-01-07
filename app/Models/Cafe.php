<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    use HasFactory;

    public function mahallah() { 
        
        return $this->belongsTo(Mahallah::class, 'mahallah_id');
    
    }

    public function menus()
{
    return $this->hasMany(Menu::class, 'cafe_id');
}

    public function orders() { 
        
        return $this->hasMany(Order::class); 
    }
}
