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
        Schema::create('agences', function (Blueprint $table) {
            $table->id();
            $table->string('agence_name', 25)->unique();
            $table->string('agence_phone', 12);
            $table->string('agence_adresse', 25);
            $table->string('agence_status', 12);
            $table->string('agence_mail', 50);
            $table->string('agence_sender_mail');
            $table->string('agence_smtp_host', 50);
            $table->addColumn('integer', 'agence_smtp_port');
            $table->string('agence_smtp_username');
            $table->string('agence_logo_id');
            $table->string('agence_site_url', 50)->nullable();
            $table->string("agence_smtp_password");
            $table->unsignedBigInteger('responsable_id');
            $table->foreign('responsable_id')->references('id')->on('users')->cascadeOnDelete();
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
