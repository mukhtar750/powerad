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
        if (Schema::hasTable('notifications')) {
            return;
        }
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // booking_created, payment_success, billboard_verified, etc.
            $table->morphs('notifiable'); // user_id and user_type
            $table->text('data'); // JSON data for the notification
            $table->timestamp('read_at')->nullable();
            $table->timestamps();
            
            $table->index('type');
            $table->index('read_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
