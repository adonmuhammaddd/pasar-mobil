<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_sales', function (Blueprint $table) {
            $table->id();
            $table->string('invoice', 50);
            $table->foreignId('customer_id')
                ->constrained('tbl_customer')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            // $table->foreign('customer_id')->references('id')->on('tbl_customer');
            $table->integer('total_price');
            $table->integer('discount');
            $table->integer('final_price');
            $table->integer('cash');
            $table->integer('remaining');
            $table->string('note');
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
        Schema::dropIfExists('tbl_sales');
    }
}
