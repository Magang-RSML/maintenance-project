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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('brand');
            $table->unsignedBigInteger('room_id'); // Foreign key ke tabel rooms
            $table->enum('status', ['active', 'inactive', 'maintenance', 'reporting'])->default('active');
            $table->timestamps();
            $table->boolean('sync_flag')->default(0);
            $table->boolean('sync_status')->default(0);

            // Menambahkan foreign key constraint
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devices');
    }
};