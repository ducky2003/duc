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
        Schema::create('post', function (Blueprint $table) {
            $table->increments('id_post');
            $table->string('post_title', 100);
            $table->string('post_content', 500);
            $table->string('post_img', 50);
            $table->date('post_date');
            $table->unsignedInteger('id_supp');
            $table->unsignedInteger('id_place');
            $table->boolean('isActive');
            $table->timestamps();
        });
        Schema::table('post', function($table) {
            $table->foreign('id_supp')->references('id_supp')->on('supplier');
            $table->foreign('id_place')->references('id_place')->on('place');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
