<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('glasses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('frame_id');
            $table->foreign('frame_id')
                ->references('id')
                ->on('frames')
                ->onDelete('cascade');
            $table->unsignedBigInteger('lens_id');
            $table->foreign('lens_id')
                ->references('id')
                ->on('lenses')
                ->onDelete('cascade');
            $table->unsignedBigInteger('basket_id');
            $table->foreign('basket_id')
                ->references('id')
                ->on('baskets')
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
        Schema::dropIfExists('glasses');
    }
}
