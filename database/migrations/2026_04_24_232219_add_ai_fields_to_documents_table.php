<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->string('document_title');
            $table->text('document_description')->nullable();
            $table->string('document_type');
            $table->string('document_file');
            $table->integer('document_size')->nullable();
            $table->string('document_status');
            $table->json('document_tags')->nullable();
            $table->string('document_uploader');
        });
    }

    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn('document_title');
            $table->dropColumn('document_description');
            $table->dropColumn('document_type');
            $table->dropColumn('document_file');
            $table->dropColumn('document_size');
            $table->dropColumn('document_status');
            $table->dropColumn('document_tags');
            $table->dropColumn('document_uploader');
        });
    }
};