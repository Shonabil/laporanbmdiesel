<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('progress', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('report_id');
        $table->string('title'); 
        $table->text('description');
        $table->string('image')->nullable();
        $table->timestamps();

        $table->foreign('report_id')->references('id')->on('reports')->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('progress');
}

};
