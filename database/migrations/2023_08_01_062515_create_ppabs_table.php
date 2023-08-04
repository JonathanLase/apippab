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
        Schema::create('ppab', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('glsap_id');
            $table->string('jenis_pekerjaan', 255);
            $table->timestamps();

            $table->foreign('glsap_id')->references('id')->on('glsap')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ppab');
    }
};
