<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('billboard_id')->constrained()->onDelete('cascade');
            $table->foreignId('advertiser_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('loap_id')->constrained('users')->onDelete('cascade');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('duration_days');
            $table->decimal('total_amount', 12, 2);
            $table->decimal('company_commission', 12, 2); // 10%
            $table->decimal('loap_amount', 12, 2); // 90%
            $table->string('status')->default('pending'); // pending, paid, active, completed, cancelled
            $table->string('payment_reference')->nullable();
            $table->string('payment_status')->default('pending'); // pending, paid, failed
            $table->json('payment_details')->nullable(); // Paystack response
            $table->text('campaign_details')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
