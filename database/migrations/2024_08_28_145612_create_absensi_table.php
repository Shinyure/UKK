<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absensi', function (Blueprint $table) {
            $table->id();
            $table->string('nip');
            $table->boolean('senin')->default(0);
            $table->boolean('selasa')->default(0);
            $table->boolean('rabu')->default(0);
            $table->boolean('kamis')->default(0);
            $table->boolean('jumat')->default(0);
            $table->string('bulan'); // Menyimpan bulan absensi
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('absensi'); // Menghapus tabel jika rollback dilakukan
    }
};
