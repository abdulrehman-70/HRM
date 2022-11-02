<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameProfessionalTaxColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('salary_slips', function(Blueprint $table) {
            $table->renameColumn('professional_text', 'professional_tax');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('stnk', function(Blueprint $table) {
            $table->renameColumn('professional_text', 'professional_tax');
        });
    }
}
