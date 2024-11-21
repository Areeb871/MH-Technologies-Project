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
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('subcategory_id')->nullable();
            // Define the foreign key constraint
            $table->foreign('subcategory_id')->references('id')->on('subcategories')->onDelete('cascade');
            // 'onDelete('cascade')' will delete the product if the associated category is deleted
            // Add the category_id column
            $table->unsignedBigInteger('category_id')->nullable();
            // Define the foreign key constraint
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            // 'onDelete('cascade')' will delete the product if the associated category is deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};
