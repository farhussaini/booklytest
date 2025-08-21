<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::firstOrCreate(
            ['email' => 'admin@bookly.sa'],
            [
                'first_name' => 'System',
                'last_name' => 'Administrator',
                'password' => Hash::make('password123'),
                'phone' => '+966501234567',
                'user_type' => 'admin',
                'status' => 'active',
                'email_verified_at' => now(),
                'timezone' => 'Asia/Riyadh',
                'language' => 'ar',
                'country' => 'Saudi Arabia',
                'city' => 'Riyadh',
            ]
        );

        // Create provider users
        $providers = [
            [
                'first_name' => 'أحمد',
                'last_name' => 'السعدي',
                'email' => 'ahmed.saadi@provider.com',
                'phone' => '+966501234568',
                'gender' => 'male',
                'city' => 'الرياض',
                'country' => 'السعودية',
            ],
            [
                'first_name' => 'فاطمة',
                'last_name' => 'المحمدي',
                'email' => 'fatima.mohammadi@provider.com',
                'phone' => '+966501234569',
                'gender' => 'female',
                'city' => 'جدة',
                'country' => 'السعودية',
            ],
            [
                'first_name' => 'محمد',
                'last_name' => 'العتيبي',
                'email' => 'mohammed.otaibi@provider.com',
                'phone' => '+966501234570',
                'gender' => 'male',
                'city' => 'الدمام',
                'country' => 'السعودية',
            ],
        ];

        foreach ($providers as $provider) {
            User::firstOrCreate(
                ['email' => $provider['email']],
                array_merge($provider, [
                    'password' => Hash::make('password123'),
                    'user_type' => 'provider',
                    'status' => 'active',
                    'email_verified_at' => now(),
                    'timezone' => 'Asia/Riyadh',
                    'language' => 'ar',
                    'date_of_birth' => '1990-01-01',
                ])
            );
        }

        // Create customer users
        $customers = [
            [
                'first_name' => 'سارة',
                'last_name' => 'الغامدي',
                'email' => 'sarah.ghamdi@customer.com',
                'phone' => '+966501234571',
                'gender' => 'female',
                'city' => 'الرياض',
                'country' => 'السعودية',
            ],
            [
                'first_name' => 'عبدالله',
                'last_name' => 'القحطاني',
                'email' => 'abdullah.qahtani@customer.com',
                'phone' => '+966501234572',
                'gender' => 'male',
                'city' => 'مكة',
                'country' => 'السعودية',
            ],
            [
                'first_name' => 'نورا',
                'last_name' => 'الشهري',
                'email' => 'nora.shahri@customer.com',
                'phone' => '+966501234573',
                'gender' => 'female',
                'city' => 'المدينة المنورة',
                'country' => 'السعودية',
            ],
            [
                'first_name' => 'خالد',
                'last_name' => 'البقمي',
                'email' => 'khalid.baqami@customer.com',
                'phone' => '+966501234574',
                'gender' => 'male',
                'city' => 'الطائف',
                'country' => 'السعودية',
            ],
        ];

        foreach ($customers as $customer) {
            User::firstOrCreate(
                ['email' => $customer['email']],
                array_merge($customer, [
                    'password' => Hash::make('password123'),
                    'user_type' => 'customer',
                    'status' => 'active',
                    'email_verified_at' => now(),
                    'timezone' => 'Asia/Riyadh',
                    'language' => 'ar',
                    'date_of_birth' => '1995-06-15',
                ])
            );
        }

        // Create some unverified users for testing
        User::firstOrCreate(
            ['email' => 'test.unverified@example.com'],
            [
                'first_name' => 'Test',
                'last_name' => 'Unverified',
                'password' => Hash::make('password123'),
                'phone' => '+966501234575',
                'user_type' => 'customer',
                'status' => 'active',
                'timezone' => 'Asia/Riyadh',
                'language' => 'en',
                'country' => 'Saudi Arabia',
                'city' => 'Riyadh',
            ]
        );
    }
}
