<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joins', function (Blueprint $table) {
            $table->bigIncrements('join_id');
            $table->string('join_first_name',200);
            $table->string('join_second_name',200);
            $table->string('join_body');
            $table->string('join_email',200);
            $table->string('join_phonenumber',200);
            $table->char('join_application_id',200);
            $table->string('join_resume');
            $table->string('join_cover_letter');
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
        Schema::dropIfExists('joins');
    }
}
