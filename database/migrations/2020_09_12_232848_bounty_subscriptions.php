<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BountySubscriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bounty_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->string('challenge');
            $table->string('user');
            $table->enum('status', ['completed', 'started', 'not started', 'lost'])->default('not started');
            $table->integer('subscribers')->default(5);
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
        Schema::dropIfExists('bounty_subscriptions');
    }
}
