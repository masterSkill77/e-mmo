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
        Schema::table("questions", function ($table) {
            $table->string("type");
            $table->string("question_for");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table("questions", function ($table) {
            $table->dropColumn("type");
            $table->dropColumn("question_for");
        });
    }
};
