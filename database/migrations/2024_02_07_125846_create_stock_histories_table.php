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
        Schema::create('stock_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products')
            ->cascadeOnUpdate()->restrictOnDelete();
            $table->foreignId('vendor_id')->references('id')->on('vendors')
            ->cascadeOnUpdate()->restrictOnDelete();
            $table->integer('quantity');
            $table->date('date');
            $table->decimal('total_cost', 10, 2);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock_histories');
    }
};
