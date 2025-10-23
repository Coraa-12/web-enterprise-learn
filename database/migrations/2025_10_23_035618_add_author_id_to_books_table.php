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
        Schema::table('books', function (Blueprint $table) {
            // Remove old author string column and add author_id foreign key
            $table->dropColumn('author');
            $table->foreignId('author_id')->nullable()->after('title')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('books', function (Blueprint $table) {
            // Restore old author column and remove author_id
            $table->dropForeign(['author_id']);
            $table->dropColumn('author_id');
            $table->string('author')->after('title');
        });
    }
};
