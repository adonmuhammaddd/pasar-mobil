<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblStockTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_stock', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')
                ->constrained('tbl_car')
                ->onUpdate('cascade');
            // $table->foreign('car_id')->references('id')->on('tbl_car');
            $table->enum('type', ['in', 'out']);
            $table->string('detail', 200);
            $table->foreignId('supplier_id')
                ->constrained('tbl_supplier')
                ->onUpdate('cascade');
            // $table->foreign('supplier_id')->references('id')->on('tbl_supplier');
            $table->integer('quantity');
            // $table->foreignId('user_id')
            //     ->constrained('tbl_user')
            //     ->onUpdate('cascade');
            $table->string('user_id');
            $table->foreign('user_id')->references('id')->on('tbl_user');
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
        Schema::dropIfExists('tbl_stock');
    }
}
