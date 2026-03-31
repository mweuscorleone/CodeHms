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
        Schema::create('patients', function (Blueprint $table) {
            //patient details
            $table->id();
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->date('date_of_birth');
             $table->enum('gender', ['male', 'female']);

            //payment details
            $table->foreignId('sponsor_id')->constrained()->cascadeOnDelete();
            $table->string('phone');
            $table->string('address');

            //Relative details
            $table->string('relative_name');
            $table->string('relative_phone');
            $table->enum('relationship', ['father', 'brother', 'mother', 'sisiter', 'wife', 'husband', 'neighbour','other']);
            $table->string('relative_address');
            $table->foreignId('created_by')->constrained('employees')->cascadeOnDelete();
        

            

        
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
