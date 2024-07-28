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
        Schema::table('militaires', function (Blueprint $table) {
            $table->foreignId('patrouille_id')->nullable()->constrained('patrouilles')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('militaires', function (Blueprint $table) {
            //
        });
    }
};