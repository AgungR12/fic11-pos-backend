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
        Schema::table('pricing', function (Blueprint $table) {
            $table->enum('calender', ['Hari', 'Bulan', 'Tahun'])->after('warranty');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pricing', function (Blueprint $table) {
            if (Schema::hasColumn('pricing', 'calender')) {
                $table->dropColumn('calender');
            }
        });
    }
};
