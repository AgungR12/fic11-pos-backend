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
        Schema::table('chef', function (Blueprint $table) {
            $table->string('facebook', 255)->nullable()->after('instagram');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('chef', function (Blueprint $table) {
            if (Schema::hasColumn('chef', 'facebook')) {
                $table->dropColumn('facebook');
            }
        });
    }
};
