<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name'];

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function games()
    {
        return $this->belongsToMany(Game::class)->withPivot('score')->withTimestamps();
    }

    public function getWinningPercentageAttribute()
    {
        // Add logic to calculate winning percentage based on games played and won
        $totalGames = $this->games->count();
        $wonGames = $this->games->filter(function ($game) {
            return $game->pivot->score > 0; // Assuming a positive score indicates a win
        })->count();

        return $totalGames > 0 ? ($wonGames / $totalGames) * 100 : 0;
    }
}
