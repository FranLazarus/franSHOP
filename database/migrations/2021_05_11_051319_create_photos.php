<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhotos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('photos', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->char('product_id', 10);
            $table->foreign('product_id')->references('id')->on('products');     //FK
            $table->unsignedBigInteger('pattern_id');
            $table->foreign('pattern_id')->references('id')->on('patterns');     //FK

            $table->text('photo_path');
            $table->unsignedMediumInteger('photo_size');    //從 0 到 16777215
            
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('timestamp')->default(DB::raw('CURRENT_TIMESTAMP'));
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photos');
    }
}
