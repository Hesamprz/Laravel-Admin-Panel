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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
<<<<<<< HEAD
            $table->decimal('total_price', 10, 2)->default(0);
            $table->string('status')->default('pending');
            $table->timestamps();
            
=======
            $table->decimal('total_price', 10, 2);
            $table->string('status')->default('pending'); // مثلا pending, shipped, canceled
            $table->timestamps();
>>>>>>> 78e72bb29cdbc01d296492136d2e3612c6e96224
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
