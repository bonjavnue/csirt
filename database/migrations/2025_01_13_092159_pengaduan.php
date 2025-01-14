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
        Schema::create('pengaduan', function (Blueprint $table) {
            $table->id();
            $table->text('nama_lengkap');
            $table->text('telp');
            $table->text('email');
            $table->date('tanggal_temuan');
            $table->text('nama_domain');
            $table->text('url_terdampak');
            $table->text('detail');
            $table->text('foto_bukti');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
