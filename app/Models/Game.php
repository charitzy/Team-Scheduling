<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['date', 'field_id', 'referee_id'];
    protected $casts = [
        'date' => 'datetime',
    ];

    public function teams()
    {
        return $this->belongsToMany(Team::class)->withPivot('score')->withTimestamps();
    }

    public function field()
    {
        return $this->belongsTo(Field::class);
    }

    public function referee()
    {
        return $this->belongsTo(Referee::class);
    }
}
