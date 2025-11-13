<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Billboard;
use App\Models\User;

class BillboardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get LOAP users (or create some if they don't exist)
        $loapUsers = User::where('role', 'loap')->get();
        
        if ($loapUsers->isEmpty()) {
            // Create some LOAP users
            $loapUsers = collect([
                User::create([
                    'name' => 'John Smith',
                    'email' => 'john.smith@example.com',
                    'password' => bcrypt('password'),
                    'role' => 'loap',
                    'phone' => '+2348012345678',
                    'company' => 'Smith Advertising Ltd',
                    'is_verified' => true,
                ]),
                User::create([
                    'name' => 'Sarah Johnson',
                    'email' => 'sarah.johnson@example.com',
                    'password' => bcrypt('password'),
                    'role' => 'loap',
                    'phone' => '+2348012345679',
                    'company' => 'Johnson Media Group',
                    'is_verified' => true,
                ]),
                User::create([
                    'name' => 'Michael Brown',
                    'email' => 'michael.brown@example.com',
                    'password' => bcrypt('password'),
                    'role' => 'loap',
                    'phone' => '+2348012345680',
                    'company' => 'Brown Outdoor Advertising',
                    'is_verified' => true,
                ]),
            ]);
        }

        $billboards = [
            [
                'title' => 'Victoria Island Premium Billboard',
                'description' => 'High-traffic digital LED billboard located in the heart of Victoria Island. Perfect for premium brands targeting affluent consumers.',
                'location' => 'Ahmadu Bello Way',
                'address' => 'Ahmadu Bello Way, Victoria Island, Lagos',
                'city' => 'Lagos',
                'state' => 'Lagos',
                'country' => 'Nigeria',
                'latitude' => 6.4281,
                'longitude' => 3.4219,
                'size' => '48ft x 14ft',
                'type' => 'Digital',
                'orientation' => 'Landscape',
                'price_per_day' => 150000,
                'price_per_week' => 900000,
                'price_per_month' => 3000000,
                'status' => 'available',
                'is_verified' => true,
                'is_active' => true,
                'features' => ['LED Display', 'High Resolution', 'Weather Resistant', 'Remote Management'],
            ],
            [
                'title' => 'Lekki Phase 1 Strategic Billboard',
                'description' => 'Strategic static billboard positioned at Lekki Phase 1 roundabout. High visibility for commuters and residents.',
                'location' => 'Lekki Phase 1 Roundabout',
                'address' => 'Lekki Phase 1 Roundabout, Lagos',
                'city' => 'Lagos',
                'state' => 'Lagos',
                'country' => 'Nigeria',
                'latitude' => 6.4698,
                'longitude' => 3.5852,
                'size' => '32ft x 12ft',
                'type' => 'Static',
                'orientation' => 'Portrait',
                'price_per_day' => 75000,
                'price_per_week' => 450000,
                'price_per_month' => 1500000,
                'status' => 'available',
                'is_verified' => true,
                'is_active' => true,
                'features' => ['High Visibility', 'Strategic Location', 'Durable Materials'],
            ],
            [
                'title' => 'Ikeja Airport Road Billboard',
                'description' => 'Large format billboard on Airport Road, Ikeja. Perfect for reaching business travelers and airport visitors.',
                'location' => 'Airport Road, Ikeja',
                'address' => 'Airport Road, Ikeja, Lagos',
                'city' => 'Lagos',
                'state' => 'Lagos',
                'country' => 'Nigeria',
                'latitude' => 6.6018,
                'longitude' => 3.3515,
                'size' => '40ft x 16ft',
                'type' => 'LED',
                'orientation' => 'Landscape',
                'price_per_day' => 120000,
                'price_per_week' => 720000,
                'price_per_month' => 2400000,
                'status' => 'available',
                'is_verified' => true,
                'is_active' => true,
                'features' => ['LED Technology', 'Airport Proximity', 'Business District', '24/7 Visibility'],
            ],
            [
                'title' => 'Abuja Central Business District Billboard',
                'description' => 'Premium billboard in Abuja CBD. High-end location perfect for corporate and luxury brand advertising.',
                'location' => 'Central Business District',
                'address' => 'Central Business District, Abuja',
                'city' => 'Abuja',
                'state' => 'FCT',
                'country' => 'Nigeria',
                'latitude' => 9.0765,
                'longitude' => 7.3986,
                'size' => '36ft x 18ft',
                'type' => 'Digital',
                'orientation' => 'Landscape',
                'price_per_day' => 100000,
                'price_per_week' => 600000,
                'price_per_month' => 2000000,
                'status' => 'available',
                'is_verified' => true,
                'is_active' => true,
                'features' => ['CBD Location', 'Corporate Audience', 'High Resolution', 'Premium Positioning'],
            ],
            [
                'title' => 'Port Harcourt Expressway Billboard',
                'description' => 'Strategic billboard on Port Harcourt Expressway. High traffic volume with excellent visibility.',
                'location' => 'Port Harcourt Expressway',
                'address' => 'Port Harcourt Expressway, Rivers State',
                'city' => 'Port Harcourt',
                'state' => 'Rivers',
                'country' => 'Nigeria',
                'latitude' => 4.8156,
                'longitude' => 7.0498,
                'size' => '30ft x 10ft',
                'type' => 'Traditional',
                'orientation' => 'Portrait',
                'price_per_day' => 50000,
                'price_per_week' => 300000,
                'price_per_month' => 1000000,
                'status' => 'available',
                'is_verified' => true,
                'is_active' => true,
                'features' => ['Expressway Location', 'High Traffic', 'Cost Effective'],
            ],
            [
                'title' => 'Kano City Center Billboard',
                'description' => 'Large format billboard in Kano city center. Perfect for reaching the northern market.',
                'location' => 'Kano City Center',
                'address' => 'Kano City Center, Kano State',
                'city' => 'Kano',
                'state' => 'Kano',
                'country' => 'Nigeria',
                'latitude' => 12.0022,
                'longitude' => 8.5920,
                'size' => '28ft x 14ft',
                'type' => 'Static',
                'orientation' => 'Landscape',
                'price_per_day' => 40000,
                'price_per_week' => 240000,
                'price_per_month' => 800000,
                'status' => 'available',
                'is_verified' => true,
                'is_active' => true,
                'features' => ['City Center', 'Northern Market', 'High Visibility'],
            ],
            [
                'title' => 'Ibadan Ring Road Billboard',
                'description' => 'Strategic billboard on Ibadan Ring Road. High traffic location with excellent reach.',
                'location' => 'Ibadan Ring Road',
                'address' => 'Ibadan Ring Road, Oyo State',
                'city' => 'Ibadan',
                'state' => 'Oyo',
                'country' => 'Nigeria',
                'latitude' => 7.3775,
                'longitude' => 3.9470,
                'size' => '32ft x 12ft',
                'type' => 'LED',
                'orientation' => 'Portrait',
                'price_per_day' => 60000,
                'price_per_week' => 360000,
                'price_per_month' => 1200000,
                'status' => 'available',
                'is_verified' => true,
                'is_active' => true,
                'features' => ['Ring Road Location', 'LED Technology', 'High Traffic'],
            ],
            [
                'title' => 'Enugu Independence Layout Billboard',
                'description' => 'Premium billboard in Enugu Independence Layout. Perfect for reaching the eastern market.',
                'location' => 'Independence Layout',
                'address' => 'Independence Layout, Enugu State',
                'city' => 'Enugu',
                'state' => 'Enugu',
                'country' => 'Nigeria',
                'latitude' => 6.4474,
                'longitude' => 7.5148,
                'size' => '26ft x 10ft',
                'type' => 'Digital',
                'orientation' => 'Landscape',
                'price_per_day' => 45000,
                'price_per_week' => 270000,
                'price_per_month' => 900000,
                'status' => 'available',
                'is_verified' => true,
                'is_active' => true,
                'features' => ['Digital Display', 'Eastern Market', 'Premium Location'],
            ],
        ];

        foreach ($billboards as $index => $billboardData) {
            $billboardData['user_id'] = $loapUsers->random()->id;
            Billboard::create($billboardData);
        }

        $this->command->info('Created ' . count($billboards) . ' sample billboards');
    }
}