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
        Schema::table('documents', function (Blueprint $table) {
            $table->string('upload_type')->nullable()->after('doc_type');
            $table->string('financial_year')->nullable()->after('upload_type');
            $table->date('date_from')->nullable()->after('financial_year');
            $table->date('date_to')->nullable()->after('date_from');
            $table->string('doc_type', 300)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn('upload_type');
            $table->dropColumn('financial_year');
            $table->dropColumn('date_from');
            $table->dropColumn('date_to');
            $table->string('doc_type', 100)->change();
        });
    }
};
