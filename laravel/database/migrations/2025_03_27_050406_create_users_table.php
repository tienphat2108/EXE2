<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // ID tự động tăng
            $table->string('name'); // Tên người dùng
            $table->string('email')->unique(); // Email (không trùng)
            $table->string('password'); // Mật khẩu
            $table->enum('role', ['admin', 'user'])->default('user'); // Vai trò
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

