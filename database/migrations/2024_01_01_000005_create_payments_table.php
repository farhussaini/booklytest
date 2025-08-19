<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained()->onDelete('cascade');
            $table->foreignId('business_id')->constrained()->onDelete('cascade');
            $table->foreignId('customer_id')->constrained('users')->onDelete('cascade');
            $table->enum('payment_method', ['cash', 'card', 'bank_transfer', 'paypal', 'stripe', 'mada', 'stc_pay']);
            $table->string('transaction_id')->nullable();
            $table->json('gateway_response')->nullable();
            $table->decimal('amount', 10, 2);
            $table->string('currency', 10)->default('SAR');
            $table->decimal('fee', 10, 2)->default(0.00);
            $table->decimal('net_amount', 10, 2);
            $table->timestamp('payment_date')->useCurrent();
            $table->enum('status', ['pending', 'processing', 'completed', 'failed', 'cancelled', 'refunded'])->default('pending');
            $table->text('failure_reason')->nullable();
            $table->decimal('refund_amount', 10, 2)->default(0.00);
            $table->timestamp('refund_date')->nullable();
            $table->timestamps();

            $table->index(['booking_id']);
            $table->index(['business_id']);
            $table->index(['customer_id']);
            $table->index(['status']);
            $table->index(['transaction_id']);
        });

        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('business_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('booking_id')->nullable()->constrained()->onDelete('cascade');
            $table->enum('type', ['email', 'sms', 'push', 'whatsapp']);
            $table->enum('channel', ['booking_confirmation', 'booking_reminder', 'booking_cancelled', 'payment_received', 'follow_up', 'marketing', 'system']);
            $table->string('title');
            $table->text('message');
            $table->string('recipient_email')->nullable();
            $table->string('recipient_phone', 20)->nullable();
            $table->timestamp('scheduled_at')->nullable();
            $table->timestamp('sent_at')->nullable();
            $table->enum('delivery_status', ['pending', 'sent', 'delivered', 'failed', 'bounced'])->default('pending');
            $table->text('failure_reason')->nullable();
            $table->timestamp('opened_at')->nullable();
            $table->timestamp('clicked_at')->nullable();
            $table->timestamps();

            $table->index(['user_id']);
            $table->index(['business_id']);
            $table->index(['booking_id']);
            $table->index(['scheduled_at']);
            $table->index(['delivery_status']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('notifications');
        Schema::dropIfExists('payments');
    }
};
