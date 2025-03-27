<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Tạo bảng users
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('user_name', 25);
            $table->string('user_email', 55)->unique();
            $table->string('user_pass', 255);
            $table->timestamps();
        });

        // Tạo bảng products
        Schema::create('products', function (Blueprint $table) {
            $table->id('product_id');
            $table->string('product_name', 255);
            $table->double('product_price');
            $table->text('product_description');
            $table->timestamps();
        });

        // Tạo bảng orders
        Schema::create('orders', function (Blueprint $table) {
            $table->id('order_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });

        // Tạo bảng order_details
        Schema::create('order_details', function (Blueprint $table) {
            $table->id('order_detail_id');
            $table->unsignedBigInteger('order_id');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->timestamps();
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade');
        });

        // Tạo bảng cache
        Schema::create('cache', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->mediumText('value');
            $table->integer('expiration');
        });

        // Tạo bảng cache_locks
        Schema::create('cache_locks', function (Blueprint $table) {
            $table->string('key')->primary();
            $table->string('owner');
            $table->integer('expiration');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cache_locks');
        Schema::dropIfExists('cache');
        Schema::dropIfExists('order_details');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('products');
        Schema::dropIfExists('users');
    }
};

