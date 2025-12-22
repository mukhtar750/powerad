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
        Schema::create('citizen_reports', function (Blueprint $table) {
            $table->id();
            $table->foreignId('billboard_id')->nullable()->constrained()->nullOnDelete();
            $table->string('location_description');
            $table->string('gps_coordinates')->nullable();
            $table->string('report_type'); // safety, content, illegal
            $table->text('description');
            $table->string('photo_path')->nullable();
            $table->string('status')->default('pending'); // pending, investigating, resolved
            $table->string('contact_email')->nullable();
            $table->text('investigation_notes')->nullable();
            $table->text('resolution_notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citizen_reports');
    }
};
