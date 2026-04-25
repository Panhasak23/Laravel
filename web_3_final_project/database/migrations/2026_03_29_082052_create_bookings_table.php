<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasTable('bookings')) {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('room_id')->constrained();
            $table->string('guest_name');
            $table->string('guest_email');
            $table->string('guest_phone');
            $table->date('check_in');
            $table->date('check_out');
            $table->string('status')->default('pending'); // Will use our enum
            $table->decimal('total_price', 8, 2);
            $table->string('promo_code')->nullable();
            $table->timestamps();
        });
        }
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};