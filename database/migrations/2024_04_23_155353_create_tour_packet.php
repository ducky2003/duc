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
        Schema::create('tour_packet', function (Blueprint $table) {
            $table->increments('id_pack');
            $table->string('pack_title', 100);
            $table->string('pack_desc', 500);
            $table->integer('pack_price');
            $table->date('start_date');
            $table->string('pack_duration', 10);
            $table->integer('pack_rate');
            $table->string('pack_number', 2);
            $table->string('pack_img', 50);
            $table->unsignedInteger('id_supp');
            $table->boolean('isActive');
            $table->unsignedInteger('id_place');
            $table->timestamps();
        });
        Schema::table('tour_packet', function($table) {
            $table->foreign('id_supp')->references('id_supp')->on('supplier');
            $table->foreign('id_place')->references('id_place')->on('place');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tour_packet');
    }
};
