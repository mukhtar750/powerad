<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('regulator_type')->nullable()->after('bio'); // 'arcon' or 'state'
            $table->string('regulator_agency')->nullable()->after('regulator_type'); // e.g., 'ARCON', 'LASAA'
            $table->string('state')->nullable()->after('regulator_agency'); // e.g., 'Lagos'
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['regulator_type', 'regulator_agency', 'state']);
        });
    }
};