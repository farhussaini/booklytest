<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('training_requests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone', 20);
            $table->string('company')->nullable();
            $table->enum('service_type', ['demo', 'training', 'setup', 'consultation']);
            $table->text('notes')->nullable();
            $table->enum('status', ['pending', 'contacted', 'confirmed', 'completed', 'cancelled'])->default('pending');
            $table->timestamps();

            $table->index(['email']);
            $table->index(['phone']);
            $table->index(['service_type']);
            $table->index(['status']);
            $table->index(['created_at']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('training_requests');
    }
};

