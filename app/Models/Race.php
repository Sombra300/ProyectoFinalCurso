<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Race extends Model
{
    public function character(): HasMany{
        return $this->hasMany(Character::class);
    }

    public function subraces(): HasMany{
        return $this->hasMany(SubRace::class);
    }

    public function abilities(): BelongsToMany {
    return $this->belongsToMany(Ability::class, 'ability_race');
}
}
