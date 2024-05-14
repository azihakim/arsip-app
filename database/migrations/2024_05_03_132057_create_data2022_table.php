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
        Schema::create('data2022', function (Blueprint $table) {
            $table->id();
            $table->string('jenis');
            $table->string('nopol');
            $table->string('rangka');
            $table->string('mesin');
            $table->string('tahun_pembuatan');
            $table->string('pemakai');
            $table->string('skpd');
            $table->string('tgl_ba');
            $table->string('no_bpkb');
            $table->string('no_ba');
            $table->date('habis_masa_pinjam');
            $table->string('dok_ba')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data');
    }
};
