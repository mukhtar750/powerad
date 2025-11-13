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
        Schema::table('bookings', function (Blueprint $table) {
            $table->timestamp('paid_at')->nullable()->after('payment_details');
            $table->string('transfer_reference')->nullable()->after('paid_at');
            $table->enum('transfer_status', ['pending', 'initiated', 'completed', 'failed'])->default('pending')->after('transfer_reference');
            $table->timestamp('transferred_at')->nullable()->after('transfer_status');
            $table->json('transfer_details')->nullable()->after('transferred_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn([
                'paid_at',
                'transfer_reference',
                'transfer_status',
                'transferred_at',
                'transfer_details'
            ]);
        });
    }
};
