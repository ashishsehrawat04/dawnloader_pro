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
        Schema::table('videos', function (Blueprint $table) {

            // ➕ add category column
            $table->string('category')->nullable()->after('platform');

            // ✏️ rename column
            $table->renameColumn('downloaded_file', 'video');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
          Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('category');
            $table->renameColumn('video', 'downloaded_file');
        });
    }
};
