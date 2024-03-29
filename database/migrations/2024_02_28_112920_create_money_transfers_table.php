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
        Schema::create('money_transfers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('origin_account_id');
            $table->unsignedBigInteger('destination_account_id');
            $table->foreign('origin_account_id')->references('id')->on('accounts');
            $table->foreign('destination_account_id')->references('id')->on('accounts');
            $table->foreignId('goal_id')->nullable();
            $table->string('description');
            $table->date('date');
            $table->float('amount');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('money_transfers');
    }
};
