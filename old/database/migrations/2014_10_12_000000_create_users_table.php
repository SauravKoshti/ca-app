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
            $table->string('username')->unique();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_full_name');
            $table->text('address');
            $table->string('city');
            $table->string('pincode', 6);
            $table->string('aadhar_card')->unique();
            $table->string('pan_card')->unique();
            $table->string('email')->unique();
            $table->string('gst_number')->nullable()->unique();
            $table->date('anniversary_date')->nullable();
            $table->string('mobile')->unique();
            $table->date('dob');
            $table->boolean('gender')->default(1); 
            $table->enum('user_type', ['business', 'private','admin'])->default('private');
            $table->string('role')->default('user');
            $table->string('password');
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
