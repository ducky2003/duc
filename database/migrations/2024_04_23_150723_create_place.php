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
         Schema::create('place', function (Blueprint $table) {
            $table->increments('id_place');
            $table->string('place_name', 50);
            $table->string('hotline', 11);
            $table->string('description', 500);
            $table->string('location', 100);
            $table->boolean('isActive');
            $table->string('place_img', 100);
            $table->timestamps();
            $table->integer('id_region')->unsigned();
        });
        Schema::table('place', function($table) {
            $table->foreign('id_region')->references('id_region')->on('region');
        }
    );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('place');
    }
};
