<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('referral_id')->nullable()->constrained('users')->cascadeOnDelete();
            $table->string('username')->unique();
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->decimal('balance', 10, 2)->default(0.00);
            $table->decimal('deposit', 10, 2)->default(0.00);
            $table->decimal('investment', 10, 2)->default(0.00);
            $table->decimal('uplinebonus', 10, 2)->default(0.00);
            $table->decimal('cashout', 10, 2)->default(0.00);
            $table->enum('status', ['active','inactive'])->default('inactive');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
