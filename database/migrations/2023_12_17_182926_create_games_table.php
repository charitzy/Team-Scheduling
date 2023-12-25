<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->foreignId('field_id')->constrained();
            $table->foreignId('referee_id')->constrained();
            $table->timestamps();
        });

        Schema::create('game_team', function (Blueprint $table) {
            $table->foreignId('game_id')->constrained();
            $table->foreignId('team_id')->constrained();
            $table->integer('score')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('game_team');
        Schema::dropIfExists('games');
    }
};
