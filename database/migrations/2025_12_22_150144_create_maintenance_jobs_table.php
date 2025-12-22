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
        Schema::create('maintenance_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('billboard_id')->constrained()->onDelete('cascade');
            $table->foreignId('service_provider_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('type'); // repair, installation, inspection
            $table->text('description');
            $table->string('status')->default('pending'); // pending, in_progress, completed
            $table->date('scheduled_date')->nullable();
            $table->date('completed_date')->nullable();
            $table->decimal('cost', 12, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenance_jobs');
    }
};
