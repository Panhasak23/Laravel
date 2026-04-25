<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('room_categories')) {
        Schema::create('room_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('base_price', 8, 2);
            $table->integer('capacity');
            $table->timestamps();
        });
        }
    }

    public function down()
    {
        Schema::dropIfExists('room_categories');
    }
};