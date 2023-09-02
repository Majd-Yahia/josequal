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
        Schema::create('kml_files', function (Blueprint $table) {
            $table->id();
            $table->string('file_name');
            $table->integer('file_size');
            $table->string('url');
            $table->unsignedBigInteger('user_id');
            $table->boolean('active')->default(true);
            $table->boolean('is_default')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kml_files');
    }
};
