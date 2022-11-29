<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Constraint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('invoices', function (Blueprint $table) {
            $table->foreign('AccountId')->references('id')->on('accounts');
        });
        Schema::table('invoice_details', function (Blueprint $table) {
            $table->foreign('InvoiceId')->references('id')->on('invoices');
            $table->foreign('ProductId')->references('id')->on('products');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('ProductTypeId')->references('id')->on('product_types');
        });
        Schema::table('carts', function (Blueprint $table) {
            $table->foreign('AccountId')->references('id')->on('accounts');
            $table->foreign('ProductId')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropForeign(['AccountId']);
            $table->dropForeign(['ProductId']);
        });
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropForeign(['AccountId']);
        });
        Schema::table('invoice_details', function (Blueprint $table) {
            $table->dropForeign(['InvoiceId']);
            $table->dropForeign(['ProductId']);
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['ProductTypeId']);
        });
    }
}
