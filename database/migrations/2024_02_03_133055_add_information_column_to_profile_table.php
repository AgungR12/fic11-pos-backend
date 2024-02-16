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
        Schema::table('profile', function (Blueprint $table) {
            $table->longText('information')->nullable()->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profile', function (Blueprint $table) {
            if (Schema::hasColumn('profile', 'information')) {
                $table->dropColumn('information');
            }
        });
    }
};
