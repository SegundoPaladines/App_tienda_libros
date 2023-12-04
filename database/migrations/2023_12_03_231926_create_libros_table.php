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
        Schema::create('libros', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre')->unique();
            $table->string('autor')->unique();
            $table->string('editorial')->nullable();
            $table->unsignedInteger('pub_year');
            $table->double('precio');
            $table->text('descripcion');
            $table->integer('categoria');
            $table->string('imagen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
