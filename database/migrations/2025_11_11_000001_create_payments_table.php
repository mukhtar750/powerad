<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();

            // Who received the payment (LOAP or Service Provider)
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();

            // What the payment was for
            $table->foreignId('billboard_id')->nullable()->constrained('billboards')->nullOnDelete();
            $table->foreignId('booking_id')->nullable()->constrained('bookings')->nullOnDelete();

            // Payment details
            $table->decimal('amount', 12, 2)->default(0);
            $table->string('currency', 10)->default('NGN'); // ✅ Add currency column for flexibility
            $table->string('reference')->unique();
            $table->json('split_data')->nullable();

            // Status management
            $table->enum('status', ['initialized', 'pending', 'success', 'failed'])->default('initialized');
            $table->string('gateway_response')->nullable(); // ✅ Optional: to store Paystack’s response message
            $table->string('transaction_date')->nullable(); // ✅ Optional: sometimes useful for reconciliation

            $table->timestamps();

            // Indexing for performance
            $table->index(['user_id', 'billboard_id', 'status']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
