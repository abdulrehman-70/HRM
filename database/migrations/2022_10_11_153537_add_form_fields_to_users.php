<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFormFieldsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->date('date_of_joining')->nullable();
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->string('designation')->nullable();
            $table->string('salary')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('emergency_contact_name')->nullable();
            $table->string('emergency_phone_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('gender');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('date_of_joining');
            $table->dropColumn('image');
            $table->dropColumn('address');
            $table->dropColumn('designation');
            $table->dropColumn('salary');
            $table->dropColumn('phone_number');
            $table->dropColumn('emergency_contact_name');
            $table->dropColumn('emergency_phone_number');
        });
    }
}
