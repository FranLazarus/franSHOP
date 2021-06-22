<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStocks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {

            $table->string('id',20)->unique();
            $table->char('product_id', 10);
            $table->foreign('product_id')->references('id')->on('products');     //FK
            $table->unsignedBigInteger('pattern_id');
            $table->foreign('pattern_id')->references('id')->on('patterns');     //FK
            $table->unsignedBigInteger('size_id');
            $table->foreign('size_id')->references('id')->on('sizes');     //FK

            $table->smallInteger('quantity')->nullable();
            
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
        Schema::dropIfExists('stocks');
    }
}
