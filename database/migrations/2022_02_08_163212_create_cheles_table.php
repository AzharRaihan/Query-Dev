<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChelesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cheles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('baba_id')
            ->constrained()
            ->cascadeOnUpdate()
            ->cascadeOnDelete();
            $table->string('chele');
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
        Schema::dropIfExists('cheles');
    }
}
