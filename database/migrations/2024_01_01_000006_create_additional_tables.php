<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Business Users (Staff)
        Schema::create('business_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('role', ['admin', 'manager', 'staff'])->default('staff');
            $table->json('permissions')->nullable();
            $table->json('working_hours')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamp('hired_at')->useCurrent();
            $table->timestamps();

            $table->unique(['business_id', 'user_id']);
            $table->index(['business_id']);
            $table->index(['user_id']);
        });

        // Service Providers
        Schema::create('service_providers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->decimal('commission_rate', 5, 2)->default(0.00);
            $table->boolean('is_primary')->default(false);
            $table->timestamps();

            $table->unique(['service_id', 'user_id']);
            $table->index(['service_id']);
            $table->index(['user_id']);
        });

        // Availability Schedules
        Schema::create('availability_schedules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->tinyInteger('day_of_week'); // 0=Sunday, 1=Monday, etc.
            $table->time('start_time');
            $table->time('end_time');
            $table->boolean('is_available')->default(true);
            $table->timestamps();

            $table->index(['user_id']);
            $table->index(['day_of_week']);
        });

        // Time-off/Holidays
        Schema::create('time_offs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('business_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->boolean('is_recurring')->default(false);
            $table->string('recurrence_pattern', 50)->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();

            $table->index(['user_id']);
            $table->index(['start_date', 'end_date']);
        });

        // Reviews
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained()->onDelete('cascade');
            $table->foreignId('business_id')->constrained()->onDelete('cascade');
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->foreignId('provider_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('customer_id')->constrained('users')->onDelete('cascade');
            $table->tinyInteger('rating')->unsigned();
            $table->text('review')->nullable();
            $table->text('response')->nullable();
            $table->timestamp('response_date')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_verified')->default(true);
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('approved');
            $table->timestamps();

            $table->unique(['booking_id']);
            $table->index(['business_id']);
            $table->index(['service_id']);
            $table->index(['provider_id']);
            $table->index(['rating']);
        });

        // Subscription Plans
        Schema::create('subscription_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_ar');
            $table->text('description')->nullable();
            $table->text('description_ar')->nullable();
            $table->decimal('price', 10, 2);
            $table->enum('billing_cycle', ['monthly', 'yearly']);
            $table->string('currency', 10)->default('SAR');
            $table->json('features');
            $table->json('limits_json');
            $table->integer('max_bookings')->nullable();
            $table->integer('max_services')->nullable();
            $table->integer('max_staff')->nullable();
            $table->integer('max_locations')->nullable();
            $table->boolean('is_popular')->default(false);
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Business Subscriptions
        Schema::create('business_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained()->onDelete('cascade');
            $table->foreignId('plan_id')->constrained('subscription_plans')->onDelete('restrict');
            $table->date('start_date');
            $table->date('end_date');
            $table->decimal('price', 10, 2);
            $table->string('currency', 10)->default('SAR');
            $table->string('payment_method', 50)->nullable();
            $table->string('transaction_id')->nullable();
            $table->boolean('auto_renew')->default(true);
            $table->enum('status', ['active', 'expired', 'cancelled', 'suspended'])->default('active');
            $table->timestamp('cancelled_at')->nullable();
            $table->text('cancellation_reason')->nullable();
            $table->timestamps();

            $table->index(['business_id']);
            $table->index(['plan_id']);
            $table->index(['start_date', 'end_date']);
        });

        // Coupons
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained()->onDelete('cascade');
            $table->string('code', 50);
            $table->string('name');
            $table->text('description')->nullable();
            $table->enum('type', ['percentage', 'fixed_amount']);
            $table->decimal('value', 10, 2);
            $table->decimal('minimum_amount', 10, 2)->default(0.00);
            $table->decimal('maximum_discount', 10, 2)->nullable();
            $table->integer('usage_limit')->nullable();
            $table->integer('usage_per_customer')->default(1);
            $table->integer('used_count')->default(0);
            $table->json('applicable_services')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->unique(['business_id', 'code']);
            $table->index(['business_id']);
            $table->index(['code']);
            $table->index(['start_date', 'end_date']);
        });

        // System Settings
        Schema::create('system_settings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('setting_key');
            $table->json('setting_value')->nullable();
            $table->enum('setting_type', ['string', 'number', 'boolean', 'json', 'array'])->default('string');
            $table->boolean('is_public')->default(false);
            $table->timestamps();

            $table->unique(['business_id', 'setting_key']);
            $table->index(['business_id']);
            $table->index(['setting_key']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('system_settings');
        Schema::dropIfExists('coupons');
        Schema::dropIfExists('business_subscriptions');
        Schema::dropIfExists('subscription_plans');
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('time_offs');
        Schema::dropIfExists('availability_schedules');
        Schema::dropIfExists('service_providers');
        Schema::dropIfExists('business_users');
    }
};
