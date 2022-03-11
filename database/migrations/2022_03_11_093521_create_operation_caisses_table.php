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
            $table->enum('type_operation', ['depot', 'remise_bank', 'retrait']);
            $table->date('date_operation');
            $table->longText('note_operation')->nullable();
            $table->integer('total_operation')->default('0');

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
