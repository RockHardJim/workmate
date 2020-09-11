<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Profiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('user')->unique()->index('user');
            $table->string('name');
            $table->string('surname');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->enum('path', ['information technology', 'education', 'health-care', 'botany', 'environmental', 'sports'])->default('unspecified');
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
        Schema::dropIfExists('profiles');
    }
}
