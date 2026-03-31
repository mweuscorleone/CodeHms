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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('item_id')->constrained('items')->cascadeOnDelete();
            $table->enum('consultation_type', ['consultation', 'laboratory', '']);
            $table->foreignId('sponsor_id')->constrained('sponsors')->cascadeOnDelete();
            $table->dateTime('payment_dateTime')->useCurrent();
            $table->foreignId('performed_by')->constrained('employees')->cascadeOnDelete();
            $table->enum('status', ['paid', 'not paid', 'cancelled']);
            $table->decimal('amount', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
