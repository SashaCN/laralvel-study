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
        Schema::create('marketplaces', function (Blueprint $table) {
            $table->id('id_marketplace');
            $table->string('country_code');
            $table->string('country');
            $table->string('currency');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });

        Schema::create('roles', function (Blueprint $table) {
            $table->id('id_role');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('sellers', function (Blueprint $table) {
            $table->id('id_seller');
            $table->foreignId('id_marketplace')->constrained('marketplaces', 'id_marketplace');
            $table->foreignId('id_role')->constrained('roles', 'id_role');
            $table->string('name');
            $table->string('surname');
            $table->string('email')->unique();
            $table->bigInteger('phone');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });

        Schema::create('clients', function (Blueprint $table) {
            $table->id('id_client');
            $table->foreignId('id_role')->constrained('roles', 'id_role');
            $table->string('name');
            $table->string('surname');
            $table->string('address');
            $table->string('email')->unique();
            $table->bigInteger('phone');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });

        Schema::create('categories', function (Blueprint $table) {
            $table->id('id_category');
            $table->string('name');
            $table->string('desc');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });

        Schema::create('subcategories', function (Blueprint $table) {
            $table->id('id_subcategory');
            $table->foreignId('id_category')->constrained('categories', 'id_category');
            $table->string('name');
            $table->string('desc');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });

        Schema::create('producers', function (Blueprint $table) {
            $table->id('id_producer');
            $table->string('name');
            $table->string('address');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });

        Schema::create('products', function (Blueprint $table) {
            $table->id('id_product');
            $table->string('name');
            $table->string('desc');
            $table->float('price');
            $table->integer('amount');
            $table->foreignId('id_producer')->constrained('producers', 'id_producer');
            $table->foreignId('id_category')->constrained('categories', 'id_category');
            $table->foreignId('id_subcategory')->constrained('subcategories', 'id_subcategory');
            $table->foreignId('id_seller')->constrained('sellers', 'id_seller')->cascadeOnDelete();
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });

        Schema::create('subcategories_products', function (Blueprint $table) {
            $table->id('id_subcategory_product');
            $table->foreignId('id_product')->constrained('products', 'id_product');
            $table->foreignId('id_subcategory')->constrained('subcategories', 'id_subcategory');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id('id_comment');
            $table->foreignId('id_client')->constrained('clients', 'id_client');
            $table->foreignId('id_product')->constrained('products', 'id_product');
            $table->float('mark');
            $table->string('comment');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });

        Schema::create('orders', function (Blueprint $table) {
            $table->id('id_order');
            $table->foreignId('id_client')->constrained('clients', 'id_client');
            $table->dateTime('date');
            $table->string('status');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });

        Schema::create('attributes', function (Blueprint $table) {
            $table->id('id_attribute');
            $table->string('name');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });

        Schema::create('product_attributes', function (Blueprint $table) {
            $table->id('id_product_attribute');
            $table->foreignId('id_product')->constrained('products', 'id_product');
            $table->foreignId('id_attribute')->constrained('attributes', 'id_attribute');
            $table->string('value');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });

        Schema::create('category_attributes', function (Blueprint $table) {
            $table->id('id_product_attribute');
            $table->foreignId('id_category')->constrained('categories', 'id_category');
            $table->foreignId('id_attribute')->constrained('attributes', 'id_attribute');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });

        Schema::create('client_passwords', function (Blueprint $table) {
            $table->id('id_client_password');
            $table->foreignId('id_client')->constrained('clients', 'id_client');
            $table->string('password');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });

        Schema::create('seller_passwords', function (Blueprint $table) {
            $table->id('id_seller_password');
            $table->foreignId('id_seller')->constrained('sellers', 'id_seller');
            $table->string('password');
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_details');
        Schema::dropIfExists('seller_passwords');
        Schema::dropIfExists('client_passwords');
        Schema::dropIfExists('category_attributes');
        Schema::dropIfExists('product_attributes');
        Schema::dropIfExists('attributes');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('subcategories_products');
        Schema::dropIfExists('products');
        Schema::dropIfExists('producers');
        Schema::dropIfExists('subcategories');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('clients');
        Schema::dropIfExists('sellers');
        Schema::dropIfExists('roles');
        Schema::dropIfExists('marketplaces');
    }
};
