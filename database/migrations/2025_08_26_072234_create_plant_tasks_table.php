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
        Schema::create('plant_tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plant_package_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('task_type');
            $table->integer('day');
            $table->string('title');
            $table->text('description');
            $table->text('philosophy');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plant_tasks');
    }
};
