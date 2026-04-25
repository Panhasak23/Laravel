<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('rooms')) {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_number');
            $table->foreignId('category_id')->constrained('room_categories');
            $table->string('status')->default('available'); // Will use our enum
            $table->timestamps();
        });
        }
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
    }
};