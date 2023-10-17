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
        Schema::create('book_models', function (Blueprint $table) {
            $table->id("bookID");
            $table->string("title");
            $table->string("img");
            $table->unsignedBigInteger("id");
            $table->foreign("id")->references("id")->on("admin_models");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_models');
    }
};
