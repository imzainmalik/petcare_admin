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
            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('acc_type')->comment('user=0,admin=1,sitter=2')->default(0);
            $table->string('gender')->nullable();
            $table->string('phone_number_home')->nullable();
            $table->string('phone_number_work')->nullable();
            $table->string('avatar')->nullable();
            $table->string('address_home')->nullable();
            $table->string('address_work')->nullable();
            $table->integer('account_status')->comment('0=OnHold, 1=Active, 2=Suspended')->default(0);
            $table->string('stripe_id')->nullable();
            $table->timestamp('email_verified_at')->nullable();   
            $table->integer('account_status')->comment('0=OnHold, 1=Active, 2=Suspended');       
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
