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
        Schema::create('mapel_diampu', function (Blueprint $table) {
            $table->id('id_ampu');
            $table->unsignedBigInteger('id_guru')->nullable();
            $table->unsignedBigInteger('id_mapel')->nullable();
            $table->unsignedBigInteger('id_kelas')->nullable();
            $table->timestamps();
 
            $table->foreign('id_guru')
                  ->references('id_guru')
                  ->on('guru')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
 
            $table->foreign('id_mapel')
                  ->references('id_mapel')
                  ->on('mapel')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
 
            $table->foreign('id_kelas')
                  ->references('id_kelas')
                  ->on('kelas')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mapeldiampu');
    }
};
