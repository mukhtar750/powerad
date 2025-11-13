<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            if (!Schema::hasColumn('payments', 'currency')) {
                $table->string('currency', 10)->nullable()->after('amount');
            }
            if (!Schema::hasColumn('payments', 'gateway_response')) {
                $table->text('gateway_response')->nullable()->after('status');
            }
            if (!Schema::hasColumn('payments', 'transaction_date')) {
                $table->timestamp('transaction_date')->nullable()->after('gateway_response');
            }
        });
    }

    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            if (Schema::hasColumn('payments', 'currency')) {
                $table->dropColumn('currency');
            }
            if (Schema::hasColumn('payments', 'gateway_response')) {
                $table->dropColumn('gateway_response');
            }
            if (Schema::hasColumn('payments', 'transaction_date')) {
                $table->dropColumn('transaction_date');
            }
        });
    }
};