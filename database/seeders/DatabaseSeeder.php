<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Billboard;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Ensure clean slate for idempotent seeding
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        try {
            // Order matters where FKs exist
            Payment::truncate();
            Booking::truncate();
            Billboard::truncate();
            User::truncate();
        } finally {
            DB::statement('SET FOREIGN_KEY_CHECKS=1');
        }

        $this->call([
            UserRoleSeeder::class,
            BillboardSeeder::class,
            BookingSeeder::class,
        ]);
    }
}
