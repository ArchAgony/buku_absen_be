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
        Schema::create('tamus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_tamu');
            $table->date('tanggal_datang');
            $table->string('alamat');
            $table->string('no_hp');
            $table->string('ttd');
            $table->unsignedBigInteger('keperluan_id');
            $table->foreign('keperluan_id')->references('id')->on('keperluans')->onUpdate("cascade")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tamus');
    }
};
