<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        // Tên bảng bắt đầu bằng MSSV
        Schema::create('23810310264_products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('23810310264_categories')->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 15, 2);
            $table->integer('stock_quantity');
            $table->string('image_path')->nullable();
            $table->enum('status', ['draft', 'published', 'out_of_stock'])->default('draft');
            $table->integer('discount_percent')->default(0); // Trường sáng tạo
            $table->timestamps();
        });
    }
    public function down(): void {
        Schema::dropIfExists('23810310264_products');
    }
};