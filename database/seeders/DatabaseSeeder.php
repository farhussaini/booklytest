<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Business;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\SubscriptionPlan;
use App\Models\Booking;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create admin user
        $admin = User::create([
            'first_name' => 'مدير',
            'last_name' => 'النظام',
            'email' => 'admin@bookly.sa',
            'password' => Hash::make('password'),
            'phone' => '+966500000000',
            'user_type' => 'admin',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        // Create business owner
        $owner = User::create([
            'first_name' => 'أحمد',
            'last_name' => 'محمد',
            'email' => 'ahmed@business.sa',
            'password' => Hash::make('password'),
            'phone' => '+966501234567',
            'user_type' => 'provider',
            'status' => 'active',
            'email_verified_at' => now(),
        ]);

        // Create customers
        $customers = [];
        $customerNames = [
            ['فاطمة', 'أحمد', 'fatima@example.sa'],
            ['محمد', 'علي', 'mohammed@example.sa'],
            ['نورا', 'سعد', 'nora@example.sa'],
            ['خالد', 'عبدالله', 'khalid@example.sa'],
            ['سارة', 'محمد', 'sarah@example.sa'],
        ];

        foreach ($customerNames as $customer) {
            $customers[] = User::create([
                'first_name' => $customer[0],
                'last_name' => $customer[1],
                'email' => $customer[2],
                'password' => Hash::make('password'),
                'phone' => '+96650' . rand(1000000, 9999999),
                'user_type' => 'customer',
                'status' => 'active',
                'email_verified_at' => now(),
            ]);
        }

        // Create service providers
        $providers = [];
        $providerNames = [
            ['د. سعد', 'الأحمد', 'dr.saad@business.sa'],
            ['أ. منى', 'العلي', 'mona@business.sa'],
            ['د. عبدالله', 'محمد', 'abdullah@business.sa'],
        ];

        foreach ($providerNames as $provider) {
            $providers[] = User::create([
                'first_name' => $provider[0],
                'last_name' => $provider[1],
                'email' => $provider[2],
                'password' => Hash::make('password'),
                'phone' => '+96650' . rand(1000000, 9999999),
                'user_type' => 'provider',
                'status' => 'active',
                'email_verified_at' => now(),
            ]);
        }

        // Create sample business
        $business = Business::create([
            'name' => 'عيادة الصحة المتقدمة',
            'description' => 'عيادة طبية متخصصة في تقديم أفضل الخدمات الطبية والتجميلية',
            'owner_id' => $owner->id,
            'email' => 'info@healthclinic.sa',
            'phone' => '+966112345678',
            'website' => 'https://healthclinic.sa',
            'address' => 'شارع الملك فهد، الرياض',
            'city' => 'الرياض',
            'country' => 'السعودية',
            'currency' => 'SAR',
            'language' => 'ar',
            'working_hours' => [
                'sunday' => ['start' => '08:00', 'end' => '18:00', 'is_working' => true],
                'monday' => ['start' => '08:00', 'end' => '18:00', 'is_working' => true],
                'tuesday' => ['start' => '08:00', 'end' => '18:00', 'is_working' => true],
                'wednesday' => ['start' => '08:00', 'end' => '18:00', 'is_working' => true],
                'thursday' => ['start' => '08:00', 'end' => '18:00', 'is_working' => true],
                'friday' => ['start' => '00:00', 'end' => '00:00', 'is_working' => false],
                'saturday' => ['start' => '08:00', 'end' => '16:00', 'is_working' => true],
            ],
            'booking_settings' => [
                'advance_booking_days' => 30,
                'advance_cancel_hours' => 24,
                'slot_duration' => 30,
                'auto_confirm' => true,
                'require_payment' => false,
            ],
            'subscription_plan' => 'pro',
            'subscription_expires_at' => now()->addYear(),
            'status' => 'active',
        ]);

        // Create subscription plans
        $plans = [
            [
                'name' => 'Basic Plan',
                'name_ar' => 'الباقة الأساسية',
                'description' => 'Perfect for small businesses',
                'description_ar' => 'مثالية للشركات الصغيرة',
                'price' => 299.00,
                'billing_cycle' => 'monthly',
                'features' => [
                    'unlimited_bookings' => false,
                    'max_bookings' => 100,
                    'online_payments' => true,
                    'sms_notifications' => true,
                    'calendar_integration' => false,
                    'custom_branding' => false,
                ],
                'max_bookings' => 100,
                'max_services' => 5,
                'max_staff' => 2,
                'max_locations' => 1,
                'is_popular' => false,
            ],
            [
                'name' => 'Professional Plan',
                'name_ar' => 'الباقة المميزة',
                'description' => 'Great for growing businesses',
                'description_ar' => 'رائعة للشركات النامية',
                'price' => 1999.00,
                'billing_cycle' => 'yearly',
                'features' => [
                    'unlimited_bookings' => false,
                    'max_bookings' => 1000,
                    'online_payments' => true,
                    'sms_notifications' => true,
                    'calendar_integration' => true,
                    'custom_branding' => true,
                    'api_access' => true,
                ],
                'max_bookings' => 1000,
                'max_services' => 25,
                'max_staff' => 10,
                'max_locations' => 3,
                'is_popular' => true,
            ],
            [
                'name' => 'Enterprise Plan',
                'name_ar' => 'الباقة الأولى',
                'description' => 'For large enterprises',
                'description_ar' => 'للمؤسسات الكبيرة',
                'price' => 999.00,
                'billing_cycle' => 'yearly',
                'features' => [
                    'unlimited_bookings' => true,
                    'online_payments' => true,
                    'sms_notifications' => true,
                    'calendar_integration' => true,
                    'custom_branding' => true,
                    'api_access' => true,
                    'white_label' => true,
                    'priority_support' => true,
                ],
                'max_bookings' => null,
                'max_services' => null,
                'max_staff' => null,
                'max_locations' => null,
                'is_popular' => false,
            ],
        ];

        foreach ($plans as $planData) {
            SubscriptionPlan::create(array_merge($planData, [
                'limits_json' => [
                    'bookings_per_month' => $planData['max_bookings'],
                    'services' => $planData['max_services'],
                    'staff_members' => $planData['max_staff'],
                    'locations' => $planData['max_locations'],
                ],
            ]));
        }

        // Create service categories
        $categories = [
            ['name' => 'الطب العام', 'description' => 'خدمات الطب العام والفحوصات الروتينية'],
            ['name' => 'طب الأسنان', 'description' => 'علاج وتجميل الأسنان'],
            ['name' => 'التجميل', 'description' => 'خدمات التجميل والعناية بالبشرة'],
            ['name' => 'العلاج الطبيعي', 'description' => 'جلسات العلاج الطبيعي والتأهيل'],
        ];

        foreach ($categories as $categoryData) {
            ServiceCategory::create(array_merge($categoryData, [
                'business_id' => $business->id,
            ]));
        }

        // Create services
        $services = [
            [
                'name' => 'فحص طبي شامل',
                'description' => 'فحص طبي شامل يشمل جميع الفحوصات الأساسية',
                'duration' => 60,
                'price' => 150.00,
                'category_id' => 1,
                'color' => '#7223D8',
            ],
            [
                'name' => 'استشارة طبية',
                'description' => 'استشارة طبية مع طبيب مختص',
                'duration' => 30,
                'price' => 80.00,
                'category_id' => 1,
                'color' => '#DD4C7B',
            ],
            [
                'name' => 'تنظيف الأسنان',
                'description' => 'جلسة تنظيف وتلميع الأسنان',
                'duration' => 45,
                'price' => 120.00,
                'category_id' => 2,
                'color' => '#4ECDC4',
            ],
            [
                'name' => 'تبييض الأسنان',
                'description' => 'جلسة تبييض الأسنان بالليزر',
                'duration' => 90,
                'price' => 300.00,
                'category_id' => 2,
                'color' => '#45B7D1',
            ],
            [
                'name' => 'تنظيف البشرة',
                'description' => 'جلسة تنظيف وتقشير البشرة',
                'duration' => 60,
                'price' => 200.00,
                'category_id' => 3,
                'color' => '#F39C12',
            ],
            [
                'name' => 'علاج طبيعي',
                'description' => 'جلسة علاج طبيعي وتأهيل',
                'duration' => 45,
                'price' => 100.00,
                'category_id' => 4,
                'color' => '#27AE60',
            ],
        ];

        foreach ($services as $serviceData) {
            Service::create(array_merge($serviceData, [
                'business_id' => $business->id,
                'advance_booking_time' => 2, // 2 hours minimum
                'advance_cancel_time' => 24, // 24 hours cancellation
                'buffer_time_before' => 10,
                'buffer_time_after' => 10,
            ]));
        }

        // Create sample bookings
        $services = Service::all();
        $now = now();

        for ($i = 0; $i < 20; $i++) {
            $service = $services->random();
            $customer = collect($customers)->random();
            $provider = collect($providers)->random();
            $appointmentDate = $now->copy()->addDays(rand(-10, 30));
            $startTime = collect(['09:00', '10:00', '11:00', '14:00', '15:00', '16:00'])->random();
            
            Booking::create([
                'business_id' => $business->id,
                'service_id' => $service->id,
                'provider_id' => $provider->id,
                'customer_id' => $customer->id,
                'booking_number' => 'BK' . str_pad($i + 1, 6, '0', STR_PAD_LEFT),
                'appointment_date' => $appointmentDate->format('Y-m-d'),
                'start_time' => $startTime,
                'end_time' => date('H:i', strtotime($startTime . ' + ' . $service->duration . ' minutes')),
                'duration' => $service->duration,
                'total_price' => $service->price,
                'participants' => 1,
                'status' => collect(['pending', 'confirmed', 'completed'])->random(),
                'payment_status' => collect(['pending', 'paid'])->random(),
            ]);
        }

        $this->command->info('Database seeded successfully!');
        $this->command->info('Admin Login: admin@bookly.sa / password');
        $this->command->info('Business Owner: ahmed@business.sa / password');
        $this->command->info('Sample Customer: fatima@example.sa / password');
    }
}
