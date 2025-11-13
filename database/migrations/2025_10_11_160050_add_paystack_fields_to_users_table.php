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
        Schema::table('users', function (Blueprint $table) {
            $table->string('paystack_subaccount_code')->nullable()->after('is_verified');
            $table->string('paystack_subaccount_id')->nullable()->after('paystack_subaccount_code');
            $table->string('bank_name')->nullable()->after('paystack_subaccount_id');
            $table->string('account_number')->nullable()->after('bank_name');
            $table->string('account_name')->nullable()->after('account_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'paystack_subaccount_code',
                'paystack_subaccount_id',
                'bank_name',
                'account_number',
                'account_name'
            ]);
        });
    }
};
