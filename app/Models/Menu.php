<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    public function cafe() { 
    
        return $this->belongsTo(Cafe::class); 
    } 
    
    public function orderDetails() {
        
        return $this->hasMany(OrderDetail::class, 'item_id'); 
    }
}
