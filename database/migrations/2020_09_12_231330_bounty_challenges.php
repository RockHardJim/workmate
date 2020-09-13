<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BountyChallenges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bounty_challenges', function (Blueprint $table) {
            $table->id();
            $table->string('bounty');
            $table->string('challenge')->unique();
            $table->longText('description');
            $table->enum('path', ['information technology', 'education', 'health-care', 'botany', 'environmental', 'sports', 'unspecified'])->default('unspecified');
            $table->integer('value')->default(0);
            $table->string('address');
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
        Schema::dropIfExists('bounty_profiles');
    }
}
