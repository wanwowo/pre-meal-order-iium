<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cafe extends Model
{
    use HasFactory;

    protected $fillable = ['mahallah_id', 'cafe_name', 'cafe_num'];

    public function mahallah()
    {
        return $this->belongsTo(Mahallah::class);
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}

