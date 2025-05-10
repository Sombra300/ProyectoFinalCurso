<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Race extends Model
{
    public function character(): HasMany{
        return $this->hasMany(Character::class);
    }

    public function subraces(): HasMany{
        return $this->hasMany(SubRace::class);
    }

    public function abilitys(): HasMany{
        return $this->hasMany(Ability::class);
    }

    public function spels(): HasMany{
        return $this->hasMany(Spel::class);
    }
}
