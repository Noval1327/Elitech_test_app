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
        Schema::create('post_models', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('user_models');
            $table->unsignedBigInteger('file_id');
            $table->foreign('file_id')->references('id')->on('file_models');
            $table->integer('like')->nullable();
            $table->string('comment', 255)->nullable();
            $table->string('caption', 255);
            $table->string('thumbnail', 255);
            $table->string('extension', 255);
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_models');
    }
};
