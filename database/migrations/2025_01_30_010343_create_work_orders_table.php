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
        Schema::create('work_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Foreign key ke tabel users
            $table->unsignedBigInteger('room_id'); // Foreign key ke tabel rooms
            $table->unsignedBigInteger('device_id'); // Foreign key ke tabel devices
            $table->dateTime('requested_date');
            $table->enum('status', ['pending', 'in_progress', 'completed', 'unread'])->default('unread');
            $table->text('issue_description')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps(); // created_at dan updated_at dibalik urutannya di sini
            $table->boolean('sync_flag')->default(0);

            // Menambahkan foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->foreign('device_id')->references('id')->on('devices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_orders');
    }
};