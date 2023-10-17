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
        Schema::create('users_order', function (Blueprint $table) {
            $table->id();
            $table->integer('order_number');
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->nullOnDelete();
            $table->enum('status_order', ['pending', 'shiping', 'complete', 'cancel'])->default('pending');
            // $table->enum('status_payment', ['pending', 'paid', 'failed'])->default('pending');
            $table->string('Vat');
            $table->float('shiping_price');
            $table->json('discount');
            $table->float('total_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
