<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class BountyTasks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bounty_tasks', function (Blueprint $table) {
            $limit = Carbon::now();
            $limit->addDays(2);

            $table->id();
            $table->string('challenge');
            $table->string('description');
            $table->integer('value')->default(100);
            $table->string('ends')->default($limit);
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
        Schema::dropIfExists('bounty_tasks');
    }
}
