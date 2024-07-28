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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->text("name");
            $table->text("phone");
            $table->text("email");
            $table->text("subject");
            $table->text("masseg");
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
