<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Booking;
use App\Models\Billboard;
use App\Models\User;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ensure we have required users and billboards
        $advertisers = User::where('role', 'advertiser')->get();
        $loaps = User::where('role', 'loap')->get();
        $billboards = Billboard::all();

        if ($advertisers->isEmpty() || $loaps->isEmpty() || $billboards->isEmpty()) {
            $this->command->warn('Skipping BookingSeeder: requires advertisers, LOAPs, and billboards');
            return;
        }

        // Create a mix of bookings across available billboards
        $statuses = ['pending', 'paid', 'active', 'completed', 'cancelled'];
        $paymentStatuses = ['pending', 'paid', 'failed'];

        $count = 0;
        foreach ($billboards->take(6) as $billboard) {
            // Random advertiser and loap
            $advertiser = $advertisers->random();
            $loap = $loaps->random();

            // 7-day booking window starting some days ago
            $start = Carbon::now()->subDays(rand(3, 30));
            $end = (clone $start)->addDays(7);
            $duration = $start->diffInDays($end);

            // Price based on day/week with a small variance
            $base = (float) ($billboard->price_per_week ?: ($billboard->price_per_day * 7));
            $total = round($base * (rand(95, 105) / 100), 2);
            $commission = round($total * 0.10, 2);
            $loapAmount = round($total * 0.90, 2);

            $status = $statuses[array_rand($statuses)];
            $paymentStatus = $paymentStatuses[array_rand($paymentStatuses)];

            $booking = Booking::create([
                'billboard_id' => $billboard->id,
                'advertiser_id' => $advertiser->id,
                'loap_id' => $loap->id,
                'start_date' => $start->toDateString(),
                'end_date' => $end->toDateString(),
                'duration_days' => $duration,
                'total_amount' => $total,
                'company_commission' => $commission,
                'loap_amount' => $loapAmount,
                'status' => $status,
                'payment_reference' => $paymentStatus === 'paid' ? 'PAY-'.uniqid() : null,
                'payment_status' => $paymentStatus,
                'payment_details' => $paymentStatus === 'paid' ? [
                    'provider' => 'paystack',
                    'message' => 'Payment captured for testing',
                ] : null,
                'campaign_details' => 'Test campaign booking for seeding',
            ]);

            // Add paid_at and transfer fields if paid
            if ($paymentStatus === 'paid') {
                $booking->update([
                    'paid_at' => Carbon::now()->subDays(rand(1, 3)),
                    'transfer_reference' => 'TRF-'.uniqid(),
                    'transfer_status' => ['pending', 'initiated', 'completed'][rand(0, 2)],
                    'transferred_at' => rand(0, 1) ? Carbon::now()->subDays(1) : null,
                    'transfer_details' => [
                        'provider' => 'paystack',
                        'note' => 'Seeded transfer meta',
                    ],
                ]);
            }

            $count++;
        }

        $this->command->info('Created '.$count.' sample bookings');
    }
}

