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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("doctor_id");
            $table->string("h_hospitalName",256);
            $table->integer("h_started");
            $table->integer("h_resigned");
            $table->integer("del_flg")->default(0);
            $table->timestamps();
            $table->foreign("doctor_id")
            ->references("id")
            ->on("doctors")
            ->onUpdate("cascade")
            ->onDelete("restrict");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};
