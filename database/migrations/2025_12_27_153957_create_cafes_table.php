<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCafesTable extends Migration
{
    public function up()
    {
        Schema::create('cafes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('mahallah_id')->constrained()->cascadeOnDelete();
            $table->string('cafe_name');
            $table->string('cafe_num');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cafes');
    }
}
