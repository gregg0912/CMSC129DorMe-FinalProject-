<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('owner_id');
            $table->string('dormName');
            $table->enum('housingType',['apartment','boardinghouse','bedspace','dormitory']);
            $table->enum('location',['banwa','dormArea']);
            $table->string('thumnbailPic');
            $table->string('streetName');
            $table->string('barangayName');
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
        Schema::dropIfExists('requests');
    }
}