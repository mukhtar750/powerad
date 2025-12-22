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
        Schema::create('enforcements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('billboard_id')->constrained()->onDelete('cascade');
            $table->string('violation_type');
            $table->string('action_type'); // warning, fine, removal
            $table->text('description');
            $table->enum('severity', ['low', 'medium', 'high', 'critical']);
            $table->string('status')->default('open'); // open, resolved
            $table->decimal('fine_amount', 12, 2)->nullable();
            $table->timestamp('resolved_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enforcements');
    }
};
