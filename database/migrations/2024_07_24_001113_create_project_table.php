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
        Schema::create('projeto', function (Blueprint $table) {
            $table->id('cd_projeto');
            $table->string('nm_projeto')->nullable();
            $table->date('data_ini')->nullable();
            $table->date('data_fim')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projeto');
    }
};
