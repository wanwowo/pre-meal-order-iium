<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahallah extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function cafes()
    {
        return $this->hasMany(Cafe::class);
    }
}


