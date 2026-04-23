<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('leaves', function (Blueprint $table) {
            $table->string('full_name');
            $table->string('ic_number')->unique()->index();
            $table->string('leave_type');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('total_days');
            $table->text('reason');
            $table->string('status');
            $table->text('manager_comment')->nullable();
            $table->string('email')->unique()->index();
        });
    }

    public function down(): void
    {
        Schema::table('leaves', function (Blueprint $table) {
            $table->dropColumn('full_name');
            $table->dropColumn('ic_number');
            $table->dropColumn('leave_type');
            $table->dropColumn('start_date');
            $table->dropColumn('end_date');
            $table->dropColumn('total_days');
            $table->dropColumn('reason');
            $table->dropColumn('status');
            $table->dropColumn('manager_comment');
            $table->dropColumn('email');
        });
    }
};