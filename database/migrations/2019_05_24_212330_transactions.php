<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Transactions extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('transactions',function(Blueprint $table) {
            $table->increments('id');
            $table->string('address',200)->nullable();
            $table->integer('user_id')->nullable();
            $table->decimal('amount',18,6);
            $table->string('currency')->nullable();
            $table->string('tx_id');
            $table->string('tx_hash');
            $table->string('vendor',100);
            $table->string('method',100);
            $table->string('type',100);
            $table->string('status',10);

            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();

            $table->engine = 'innoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('transactions');
    }
}
