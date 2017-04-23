<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dorms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('dormName');
            $table->integer('owner_id');
            $table->string('housingType');
            $table->string('location');
            $table->integer('address_id');
            $table->string('thumbnailPic');
            $table->integer('votes');
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
        Schema::dropIfExists('dorms');
    }
}
