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
        Schema::create('pre_order', function (Blueprint $table) {
            $table->increments('id_order');
            $table->date('date_order');
            $table->integer('state');
            $table->integer('deposit');
            $table->string('note', 500);
            $table->unsignedBigInteger('user_id');
            $table->unsignedInteger('id_pack');
            $table->boolean('isActive');
            $table->timestamps();
        });
        Schema::table('pre_order', function($table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('id_pack')->references('id_pack')->on('tour_packet');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pre_order');
    }
};
