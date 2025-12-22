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
        Schema::create('permits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('billboard_id')->constrained()->onDelete('cascade');
            $table->string('applicant_name');
            $table->string('permit_number')->unique();
            $table->string('type'); // new, renewal
            $table->string('status')->default('pending'); // pending, approved, rejected
            $table->date('start_date');
            $table->date('end_date');
            $table->text('rejection_reason')->nullable();
            $table->text('approval_notes')->nullable();
            $table->json('documents')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permits');
    }
};
