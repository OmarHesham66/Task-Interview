<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('shiping', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->references('id')->on('users_order')->cascadeOnDelete();
            // $table->enum('type', ['billing', 'shiping']);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address_name');
            $table->string('country');
            $table->string('city');
            $table->string('state')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('phone_number');
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
