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
        Schema::table('supports', function (Blueprint $table) {
            $table->date('tanggal_kunjungan')->nullable()->after('phone');
        });

        // Update existing records to use created_at date as tanggal_kunjungan
        \DB::table('supports')->whereNull('tanggal_kunjungan')->update([
            'tanggal_kunjungan' => \DB::raw('DATE(created_at)')
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('supports', function (Blueprint $table) {
            $table->dropColumn('tanggal_kunjungan');
        });
    }
};
