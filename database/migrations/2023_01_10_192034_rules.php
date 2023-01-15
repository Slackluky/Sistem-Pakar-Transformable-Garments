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
        Schema::create('rules', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->unsignedBigInteger('symptom_id');
            $table->unsignedBigInteger('drug_id');
            $table->float('probability', 4, 3);
            $table->timestamps();

            $table->unique(['code']);

            $table->foreign('symptom_id')
            ->references('id')
            ->on('symptoms')
            ->onUpdate('cascade')
            ->onDelete('cascade');

            $table->foreign('drug_id')
            ->references('id')
            ->on('drugs')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rules');
    }
};
