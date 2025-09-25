<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
     Schema::create('reports', function (Blueprint $table) {
    $table->id();
    $table->string('repair_order_no')->nullable();
    $table->string('customer')->nullable();
    $table->string('unit_model')->nullable();
    $table->integer('qty')->nullable();
    $table->string('location')->nullable();
    $table->string('document_no')->nullable();
    $table->date('document_date')->nullable();
    $table->string('brand')->nullable();
    $table->string('engine')->nullable();
    $table->string('part_no_unit')->nullable();
    $table->string('serial_no_unit')->nullable();
    $table->string('warranty')->nullable();
    $table->string('gambar')->nullable();
    $table->text('comment')->nullable();   
    $table->timestamps();
});

    }

    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
