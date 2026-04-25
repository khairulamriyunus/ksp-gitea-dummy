<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('leave_applications', function (Blueprint $table) {
            $table->string('full_name');
            $table->string('email')->unique();
            $table->string('phone_number');
            $table->string('leave_type');
            $table->date('start_date');
            $table->date('end_date');
            $table->text('reason');
            $table->string('status');
        });
    }

    public function down(): void
    {
        Schema::table('leave_applications', function (Blueprint $table) {
            $table->dropColumn('full_name');
            $table->dropColumn('email');
            $table->dropColumn('phone_number');
            $table->dropColumn('leave_type');
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
            $table->dropColumn('reason');
            $table->dropColumn('status');
        });
    }
};