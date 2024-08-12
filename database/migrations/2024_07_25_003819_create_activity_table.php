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
        Schema::create('atividade', function (Blueprint $table) {
            $table->id('cd_atividade');
            $table->unsignedBigInteger('cd_projeto');
            $table->string('nm_atividade')->nullable();
            $table->date('data_ini')->nullable();
            $table->date('data_fim')->nullable();
            $table->boolean('is_finalizada')->default(false);
            $table->timestamps();

            $table->foreign('cd_projeto')
                ->references('cd_projeto')
                ->on('projeto')
                ->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atividade');
    }
};
