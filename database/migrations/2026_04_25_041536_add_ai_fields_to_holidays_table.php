<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('holidays', function (Blueprint $table) {
            $table->string('holiday_name')->unique()->index();
            $table->date('holiday_date');
            $table->text('description')->nullable();
            $table->string('type')->index();
            $table->string('state', 30)->nullable();
            $table->boolean('is_public_holiday')->default(false);
        });
    }

    public function down(): void
    {
        Schema::table('holidays', function (Blueprint $table) {
            $table->dropColumn('holiday_name');
            $table->dropColumn('holiday_date');
            $table->dropColumn('description');
            $table->dropColumn('type');
            $table->dropColumn('state');
            $table->dropColumn('is_public_holiday');
        });
    }
};