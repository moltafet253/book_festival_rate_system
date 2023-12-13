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
        Schema::create('formal_literary_rates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rate_info_id');
            $table->foreign('rate_info_id')->references('id')->on('rate_infos');
            $table->json('points_info');
            $table->float('sum');
            $table->unsignedBigInteger('rater');
            $table->foreign('rater')->references('id')->on('users');
            $table->unsignedBigInteger('editor')->nullable();
            $table->foreign('editor')->references('id')->on('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('formal_literary_rates');
    }
};
