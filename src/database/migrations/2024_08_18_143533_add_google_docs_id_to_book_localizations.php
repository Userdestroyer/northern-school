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
        Schema::table('book_localizations', function (Blueprint $table) {
            $table->string('google_docs_id')->after('book_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('book_localizations', function (Blueprint $table) {
            $table->dropColumn('google_docs_id');
        });
    }
};
