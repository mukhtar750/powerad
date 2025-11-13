<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Clear existing users without violating FKs (cascade will remove dependents)
        User::query()->delete();

        // LOAP (Location Owner/Advertising Platform) Users
        $loapUsers = [
            [
                'name' => 'Sarah Johnson',
                'email' => 'sarah.loap@powerad.com',
                'password' => Hash::make('password'),
                'role' => 'loap',
                'phone' => '+234 801 234 5678',
                'company' => 'Victoria Island Media Ltd',
                'bio' => 'Experienced billboard owner with 15+ years in outdoor advertising. Managing premium locations across Lagos.',
            ],
            [
                'name' => 'Michael Adebayo',
                'email' => 'michael.loap@powerad.com',
                'password' => Hash::make('password'),
                'role' => 'loap',
                'phone' => '+234 802 345 6789',
                'company' => 'Lekki Outdoor Solutions',
                'bio' => 'Specializing in high-traffic locations along Lekki Expressway. Focus on digital billboards.',
            ],
            [
                'name' => 'Fatima Usman',
                'email' => 'fatima.loap@powerad.com',
                'password' => Hash::make('password'),
                'role' => 'loap',
                'phone' => '+234 803 456 7890',
                'company' => 'Ikeja GRA Display Co',
                'bio' => 'Premium billboard locations in Ikeja GRA. Known for high-quality installations.',
            ],
        ];

        // Advertiser Users
        $advertiserUsers = [
            [
                'name' => 'David Chen',
                'email' => 'david.advertiser@powerad.com',
                'password' => Hash::make('password'),
                'role' => 'advertiser',
                'phone' => '+234 804 567 8901',
                'company' => 'Tech Innovations Ltd',
                'bio' => 'Marketing Director at Tech Innovations. Focus on digital transformation campaigns.',
            ],
            [
                'name' => 'Aisha Bello',
                'email' => 'aisha.advertiser@powerad.com',
                'password' => Hash::make('password'),
                'role' => 'advertiser',
                'phone' => '+234 805 678 9012',
                'company' => 'Grand Retail Group',
                'bio' => 'Brand Manager at Grand Retail. Specializing in fashion and lifestyle advertising.',
            ],
            [
                'name' => 'James Okafor',
                'email' => 'james.advertiser@powerad.com',
                'password' => Hash::make('password'),
                'role' => 'advertiser',
                'phone' => '+234 806 789 0123',
                'company' => 'First Bank Nigeria',
                'bio' => 'Marketing Executive at First Bank. Focus on financial services advertising.',
            ],
        ];

        // Regulator Users (updated to ARCON and DOA Abuja)
        $regulatorUsers = [
            [
                'name' => 'ARCON Admin',
                'email' => 'arcon.regulator@powerad.com',
                'password' => Hash::make('password'),
                'role' => 'regulator',
                'regulator_type' => 'arcon',
                'regulator_agency' => 'ARCON',
                'state' => null,
                'phone' => '+234 807 890 1234',
                'company' => 'ARCON (Advertising Regulatory Council of Nigeria)',
                'bio' => 'National regulator overseeing advertising standards and practitioner management.',
            ],
            [
                'name' => 'DOA Abuja Admin',
                'email' => 'doa.abuja@powerad.com',
                'password' => Hash::make('password'),
                'role' => 'regulator',
                'regulator_type' => 'state',
                'regulator_agency' => 'DOA (Abuja)',
                'state' => 'FCT',
                'phone' => '+234 808 901 2345',
                'company' => 'Department of Outdoor Advertisement (Abuja)',
                'bio' => 'Abuja DOA managing permits, enforcement, and local compliance.',
            ],
        ];

        // Service Provider Users
        $serviceProviderUsers = [
            [
                'name' => 'Maria Rodriguez',
                'email' => 'maria.service@powerad.com',
                'password' => Hash::make('password'),
                'role' => 'serviceprovider',
                'phone' => '+234 809 012 3456',
                'company' => 'Creative Design Studio',
                'bio' => 'Creative Director specializing in billboard design and installation services.',
            ],
            [
                'name' => 'Kunle Adeyemi',
                'email' => 'kunle.service@powerad.com',
                'password' => Hash::make('password'),
                'role' => 'serviceprovider',
                'phone' => '+234 810 123 4567',
                'company' => 'Digital Media Solutions',
                'bio' => 'Technical Director providing digital billboard maintenance and support services.',
            ],
            [
                'name' => 'Grace Okonkwo',
                'email' => 'grace.service@powerad.com',
                'password' => Hash::make('password'),
                'role' => 'serviceprovider',
                'phone' => '+234 811 234 5678',
                'company' => 'Print & Graphics Ltd',
                'bio' => 'Print specialist offering high-quality billboard printing and installation services.',
            ],
        ];

        // Admin Users
        $adminUsers = [
            [
                'name' => 'Admin User',
                'email' => 'admin@powerad.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'phone' => '+234 812 345 6789',
                'company' => 'PowerAD International',
                'bio' => 'System Administrator managing the PowerAD platform operations.',
            ],
            [
                'name' => 'John Doe',
                'email' => 'john.admin@powerad.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'phone' => '+234 813 456 7890',
                'company' => 'PowerAD International',
                'bio' => 'Platform Manager overseeing user management and system operations.',
            ],
        ];

        // Create all users
        $allUsers = array_merge(
            $loapUsers,
            $advertiserUsers,
            $regulatorUsers,
            $serviceProviderUsers,
            $adminUsers
        );

        foreach ($allUsers as $userData) {
            User::create($userData);
        }

        $this->command->info('Created ' . count($allUsers) . ' test users with different roles:');
        $this->command->info('- ' . count($loapUsers) . ' LOAP users');
        $this->command->info('- ' . count($advertiserUsers) . ' Advertiser users');
        $this->command->info('- ' . count($regulatorUsers) . ' Regulator users');
        $this->command->info('- ' . count($serviceProviderUsers) . ' Service Provider users');
        $this->command->info('- ' . count($adminUsers) . ' Admin users');
        $this->command->info('');
        $this->command->info('All users have the password: "password"');
        $this->command->info('');
        $this->command->info('Test Login Credentials:');
        $this->command->info('LOAP: sarah.loap@powerad.com');
        $this->command->info('Advertiser: david.advertiser@powerad.com');
        $this->command->info('Regulator (ARCON): arcon.regulator@powerad.com');
        $this->command->info('Regulator (State - DOA Abuja): doa.abuja@powerad.com');
        $this->command->info('Service Provider: maria.service@powerad.com');
        $this->command->info('Admin: admin@powerad.com');
    }
}