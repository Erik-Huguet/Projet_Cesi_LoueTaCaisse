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
        Schema::create('contrats', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('duree');
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->foreignIdFor(\App\Models\Users::class)->constrained();
            $table->foreignIdFor(\App\Models\Cars::class)->constrained();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contrats');
    }
};
