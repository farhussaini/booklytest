<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('password');
            $table->string('avatar')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->text('address')->nullable();
            $table->string('city', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('timezone', 50)->default('Asia/Riyadh');
            $table->string('language', 10)->default('ar');
            $table->enum('status', ['active', 'inactive', 'suspended'])->default('active');
            $table->enum('user_type', ['customer', 'provider', 'admin'])->default('customer');
            $table->rememberToken();
            $table->timestamps();

            $table->index(['email']);
            $table->index(['user_type']);
            $table->index(['status']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
