<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalarySlipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_slips', function (Blueprint $table) {
            $table->id();
            $table->integer('basic_salary');
            $table->integer('incentive')->default(0);;
            $table->integer('house_rent')->default(0);;
            $table->integer('meal_allowance');
            $table->integer('provident_fund')->default(0);;
            $table->integer('professional_text')->default(0);;
            $table->integer('loan')->default(0);;
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salary_slips');
    }
}
