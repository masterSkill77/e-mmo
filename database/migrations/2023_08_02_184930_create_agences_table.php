<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agences', function (Blueprint $table) {
            $table->id();
            $table->string('agence_name', 50)->unique();
            $table->string('agence_phone', 20)->unique();
            $table->string('responsable_name', 20);
            $table->string('agence_adresse', 255);
            $table->string('agence_mail', 50)->unique();
            $table->string("password", 255);
            $table->string("agence_site_url", 30)->unique();
            $table->string("agence_logo", 255);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agences');
    }
};
