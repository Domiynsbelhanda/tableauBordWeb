<?php

use App\Models\Militaire;
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
        Schema::create('patrouilles', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->foreignIdFor(Militaire::class)->constrained()->onDelete('cascade');
            $table->string('matricule')->unique();
            $table->string('password');
            $table->string('plaque_vehicule');
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patrouilles');
    }
};
