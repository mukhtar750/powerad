<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Billboard;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update billboard with ID 1 to make it visible to advertisers
        Billboard::where('id', 1)->update([
            'is_verified' => true,
            'status' => 'available'
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert the changes
        Billboard::where('id', 1)->update([
            'is_verified' => false,
            'status' => 'booked'
        ]);
    }
};