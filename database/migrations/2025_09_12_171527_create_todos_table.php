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
        Schema::create('todo', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('keterangan');
            $table->text('status');
            $table->text('batas');
            $table->bigInteger('user_id')->references('id')->on('user')->onDelete()->cascade();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('todo');
    }
};
