<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 300);
            $table->text('description')->nullable();
            $table->text('imagepath')->nullable();
            $table->integer('quantity');
            $table->decimal('price', 8, 2);

            $table->foreignId('category_id')->constrained('categories')->cascadeonDelete();
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
