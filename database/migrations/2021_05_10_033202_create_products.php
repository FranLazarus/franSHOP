<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {

            $table->char('id', 10)->unique();
            $table->unsignedBigInteger('category_id')->nullable();   //從 0 到 18446744073709551615
            $table->foreign('category_id')->references('id')->on('categories');     //設為FK

            $table->string('name',50);
            $table->longText('description')->nullable();
            $table->mediumInteger('price')->nullable();              //從 -8,388,608 到 8,388,607
            $table->mediumInteger('sale_price');
            $table->smallInteger('qty');                //從 -32,768 (-2^15) 到 32,767 (2^15–1) 
            
            //$table->timestamps();                     //產生created_at、updated_at
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable();
            $table->softDeletes();                      //產生deleted_at
            $table->timestamp('timestamp');             //原Mysql時間戳

        });

        // Schema::table('products', function (Blueprint $table) {

        // });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
