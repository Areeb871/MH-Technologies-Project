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
        Schema::create('checkouts', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('address');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('zip');
            $table->string('phone');
            $table->string('company');
            $table->string('payment');
            $table->string('status')->default('delivered');
            $table->string('order_no');
            $table->unsignedBigInteger('user_id')->nullable();  
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');  
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkouts');
        Schema::dropIfExists('products');
    }
};
