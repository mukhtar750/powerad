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
        Schema::create('billboards', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // LOAP owner
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('country')->default('Nigeria');
            $table->decimal('latitude', 10, 8)->nullable();
            $table->decimal('longitude', 11, 8)->nullable();
            $table->string('size'); // e.g., "10x20", "20x40"
            $table->string('type'); // e.g., "Digital", "Static", "LED"
            $table->string('orientation'); // e.g., "Portrait", "Landscape"
            $table->decimal('price_per_day', 10, 2);
            $table->decimal('price_per_week', 10, 2);
            $table->decimal('price_per_month', 10, 2);
            $table->string('status')->default('available'); // available, booked, maintenance, inactive
            $table->json('images')->nullable(); // Store multiple image paths
            $table->string('main_image')->nullable(); // Primary image path
            $table->text('features')->nullable(); // JSON or text field for features
            $table->boolean('is_verified')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('billboards');
    }
};
