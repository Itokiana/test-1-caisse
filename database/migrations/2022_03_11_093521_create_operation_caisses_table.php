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
        Schema::create('operation_caisses', function (Blueprint $table) {
            $table->id();
            $table->string('type_operation');
            $table->string('date_operation');
            $table->longText('note_operation');
            $table->string('billets_operation');
            $table->string('pieces_operation');
            $table->string('centimes_operation');
            $table->integer('total_operation');

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
        Schema::dropIfExists('operation_caisses');
    }
};
