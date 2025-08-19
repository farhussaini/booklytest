<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('service_categories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained()->onDelete('cascade');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['business_id']);
        });

        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->constrained()->onDelete('cascade');
            $table->foreignId('category_id')->nullable()->constrained('service_categories')->onDelete('set null');
            $table->string('name');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->integer('duration'); // Duration in minutes
            $table->decimal('price', 10, 2);
            $table->string('currency', 10)->default('SAR');
            $table->integer('buffer_time_before')->default(0);
            $table->integer('buffer_time_after')->default(0);
            $table->integer('max_capacity')->default(1);
            $table->integer('advance_booking_time')->default(0);
            $table->integer('advance_cancel_time')->default(24);
            $table->string('color', 7)->default('#7223D8');
            $table->boolean('is_online')->default(false);
            $table->string('meeting_link')->nullable();
            $table->text('requirements')->nullable();
            $table->text('cancellation_policy')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['business_id']);
            $table->index(['category_id']);
            $table->index(['is_active']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
        Schema::dropIfExists('service_categories');
    }
};
