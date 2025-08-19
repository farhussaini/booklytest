<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained()->onDelete('cascade');
            $table->foreignId('service_id')->constrained()->onDelete('restrict');
            $table->foreignId('provider_id')->constrained('users')->onDelete('restrict');
            $table->foreignId('customer_id')->constrained('users')->onDelete('cascade');
            $table->string('booking_number', 50)->unique();
            $table->date('appointment_date');
            $table->time('start_time');
            $table->time('end_time');
            $table->integer('duration');
            $table->decimal('total_price', 10, 2);
            $table->string('currency', 10)->default('SAR');
            $table->integer('participants')->default(1);
            $table->text('notes')->nullable();
            $table->text('customer_notes')->nullable();
            $table->text('internal_notes')->nullable();
            $table->text('cancellation_reason')->nullable();
            $table->foreignId('rescheduled_from')->nullable()->constrained('bookings')->onDelete('set null');
            $table->string('google_event_id')->nullable();
            $table->string('zoom_meeting_id')->nullable();
            $table->enum('status', ['pending', 'confirmed', 'in_progress', 'completed', 'cancelled', 'no_show'])->default('pending');
            $table->enum('payment_status', ['pending', 'paid', 'partially_paid', 'refunded', 'failed'])->default('pending');
            $table->boolean('reminder_sent')->default(false);
            $table->boolean('follow_up_sent')->default(false);
            $table->timestamps();

            $table->index(['business_id']);
            $table->index(['service_id']);
            $table->index(['provider_id']);
            $table->index(['customer_id']);
            $table->index(['appointment_date']);
            $table->index(['status']);
            $table->index(['booking_number']);
        });

        Schema::create('booking_custom_fields', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained()->onDelete('cascade');
            $table->string('field_name');
            $table->text('field_value')->nullable();
            $table->timestamps();

            $table->index(['booking_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('booking_custom_fields');
        Schema::dropIfExists('bookings');
    }
};
