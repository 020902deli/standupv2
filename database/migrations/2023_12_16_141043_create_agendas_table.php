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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id('id_agenda'); 

            $table->time('start'); 

            $table->time('finish'); 

            $table->date('date'); 

            $table->Integer('id_event')->index(0); 

            $table->Integer('id_comediant')->index(0); 

            $table->timestamps();
            // Define foreign key constraints 

            $table->foreign('id_event')->references('id_event')->on('events')->onDelete('cascade'); 

            $table->foreign('id_comediant')->references('id_comediant')->on('comedians')->onDelete('cascade'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('agendas');
    }
};
