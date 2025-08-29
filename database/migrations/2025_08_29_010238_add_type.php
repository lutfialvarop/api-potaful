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
        Schema::table('plant_aid_guides', function (Blueprint $table) {
            $table->string('type_guide')->after('title'); // Menambahkan kolom 'type_guide' setelah kolom 'title'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('plant_aid_guides', function (Blueprint $table) {
            $table->dropColumn('type_guide'); // Menghapus kolom 'type_guide' jika rollback
        });
    }
};
