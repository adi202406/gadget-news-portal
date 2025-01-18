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
        Schema::create('hps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->text('tanggalRilis');
            $table->text('harga');
            $table->text('jaringan');
            $table->text('dimensi')->nullable();
            $table->text('berat');
            $table->text('ukuranLayar');
            $table->text('refreshRate');
            $table->text('resolusi');
            $table->text('proteksiLayar')->nullable();
            $table->text('chipset');
            $table->text('cpu');
            $table->text('gpu');
            $table->text('ram');
            $table->text('memori');
            $table->text('kameraBelakang');
            $table->text('kameraMpBelakang');
            $table->text('kameraDepan');
            $table->text('kameraMpDepan');
            $table->text('bluetooth');
            $table->text('infrared');
            $table->text('nfc');
            $table->text('gps');
            $table->text('usb');
            $table->text('jenisBaterai');
            $table->text('kapasitasBaterai');
            $table->text('fiturCas')->nullable();
            $table->text('os');
            $table->text('warna');
            $table->text('speaker');
            $table->timestamp('publised_at')->nullable();
            $table->text('link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hps');
    }
};
