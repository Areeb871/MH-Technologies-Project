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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade'); // Foreign key to Product
            $table->foreignId('checkout_id')->nullable()->constrained()->onDelete('cascade'); // Foreign key for user
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('cascade'); // Foreign key for user
            $table->integer('quantity')->default(1); // Quantity of the product in the cart
            $table->decimal('subtotal', 10, 2); // Subtotal for the cart item
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
