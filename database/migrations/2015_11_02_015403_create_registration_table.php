<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('email');
            $table->string('telephone');
            $table->date('dob');
            $table->string('street');
            $table->string('state');
            $table->integer('zip');
            $table->string('initials');
            $table->decimal('registration_fee');
            $table->string('emergency_fname');
            $table->string('emergency_lname');
            $table->string('emergency_relationship');
            $table->string('emergency_telephone');
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
        //
    }
}
