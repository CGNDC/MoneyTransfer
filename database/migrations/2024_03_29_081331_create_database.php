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
        Schema::create('tbl_users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->dateTime('birthdate');
            $table->string('full_address');
            $table->unsignedBigInteger('user_type_id')->nullable();
            $table->string('email');
            $table->string('password');
            $table->unsignedBigInteger('branch_assigned')->nullable();
            $table->timestamps();
        });

        Schema::create('tbl_user_types', function (Blueprint $table) {
            $table->id();
            $table->string('user_type');
            $table->timestamps();
        });

        Schema::create('tbl_branch_profiles', function (Blueprint $table) {
            $table->id();
            $table->string('branch_name');
            $table->string('branch_code');
            $table->string('country_iso_code');
            $table->timestamps();
        });

        Schema::create('tbl_transaction_fees', function (Blueprint $table) {
            $table->id();
            $table->float('min_amt');
            $table->float('max_amt');
            $table->float('rates');
            $table->timestamps();
        });

        Schema::create('tbl_transactions', function (Blueprint $table) {
            $table->id();
            $table->string('reference_number');
            $table->string('sender_name');
            $table->string('sender_contact');
            $table->string('recipient_name');
            $table->string('recipient_contact');
            $table->string('transaction_type')->nullable(); 
            $table->float('amount_local_currency');
            $table->string('currency_conversion_code')->nullable();
            $table->string('amount_converted')->nullable();
            $table->string('transaction_status')->default('sent');
            $table->unsignedBigInteger('branch_sent')->nullable();
            $table->unsignedBigInteger('branch_received')->nullable();
            $table->unsignedBigInteger('transfer_fee_id')->nullable();
            $table->dateTime('datetime_transaction')->nullable();   
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tbl_users');
        Schema::dropIfExists('tbl_user_types');
        Schema::dropIfExists('tbl_branch_profiles');
        Schema::dropIfExists('tbl_transaction_fees');
        Schema::dropIfExists('tbl_transactions');
    }
};
