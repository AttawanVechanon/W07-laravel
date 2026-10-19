<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();
            // 🟢 เพิ่ม 2 คอลัมน์นี้เพื่อทำ ความสัมพันธ์ (Relationships)
            $table->foreignId('title_id')->constrained('titles')->onDelete('cascade');
            $table->foreignId('organization_id')->constrained('organizations')->onDelete('cascade');
            
            $table->string('name');
            $table->string('position');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('staff');
    }
};