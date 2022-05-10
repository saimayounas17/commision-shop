<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->constrained('customers')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('product_id')->constrained('products')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string("weight");
            $table->string("bags");
            $table->string("price");
            $table->char('status', 1);//0 for buy 1 for sale
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
        Schema::dropIfExists('invoices');
    }
}
