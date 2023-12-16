<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spContacts', function (Blueprint $table) {
            $table->id('id_contact');
            $table->unsignedInteger('id_event'); 
            $table->unsignedInteger('id_sp'); 
            $table->timestamps();

            // Define foreign key constraints 

            $table->foreign('id_event')->references('id_event')->on('events')->onDelete('cascade'); 

            $table->foreign('id_sp')->references('id_sp')->on('partnerSponsors')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spContacts');
    }
};
