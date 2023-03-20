<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('profile_picture')->nullable();
            $table->string('username')->unique();
            $table->string('name')->nullable();
            $table->enum('gender', ['Tidak ingin memberi tahu', 'laki-laki', 'perempuan']);
            $table->date('date_of_birth')->nullable();
            $table->string('email')->unique();
            $table->char('phone_number')->nullable();
            $table->text('address')->nullable();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->enum('role', ['user', 'admin', 'seller', 'moderator']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
