<?php

use App\Models\categorie;
use App\Models\Organisateur;
use App\Models\salle;
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
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('description');
            $table->dateTime('date_debut');
            $table->dateTime('date_fin')->nullable();
            $table->string('image')->nullable();
            $table->foreignIdFor(salle::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Organisateur::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(categorie::class)->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenements');
    }
};
