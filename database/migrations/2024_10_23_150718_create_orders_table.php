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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            $table->string('session_id')->nullable();
            $table->decimal('total_price', 10, 2)->default(0);
            $table->enum('status', ['en attente', 'validée', 'annulée'])->default('en attente');
            $table->enum('payment_status', ['non payé', 'payé', 'remboursé'])->default('non payé');
            $table->string('shipping_method')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('prenom')->nullable();
            $table->string('nom')->nullable();
            $table->text('adresse')->nullable();
            $table->string('ville')->nullable();
            $table->string('cin')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->decimal('shipping_cost', 10, 2)->default(0);
            $table->text('note')->nullable();
            $table->timestamps();
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
