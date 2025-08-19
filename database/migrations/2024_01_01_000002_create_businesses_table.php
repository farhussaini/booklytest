<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('logo')->nullable();
            $table->foreignId('owner_id')->constrained('users')->onDelete('cascade');
            $table->string('email');
            $table->string('phone', 20)->nullable();
            $table->string('website')->nullable();
            $table->text('address')->nullable();
            $table->string('city', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('timezone', 50)->default('Asia/Riyadh');
            $table->string('currency', 10)->default('SAR');
            $table->string('language', 10)->default('ar');
            $table->json('working_hours')->nullable();
            $table->json('booking_settings')->nullable();
            $table->json('payment_settings')->nullable();
            $table->json('notification_settings')->nullable();
            $table->string('subscription_plan', 50)->default('basic');
            $table->timestamp('subscription_expires_at')->nullable();
            $table->enum('status', ['active', 'inactive', 'suspended'])->default('active');
            $table->timestamps();

            $table->index(['owner_id']);
            $table->index(['status']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('businesses');
    }
};
