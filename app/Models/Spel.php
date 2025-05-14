<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Spell extends Model
{
    public function character(): HasMany{
        return $this->hasMany(Character::class);
    }

    public function race(): HasMany{
        return $this->hasMany(Race::class);
    }

    public function subrace(): HasMany{
        return $this->hasMany(SubRace::class);
    }

    public function subclase(): HasMany{
        return $this->hasMany(SubClase::class);
    }

    public function clase(): HasMany{
        return $this->hasMany(Clase::class);
    }

    public function ability(): HasOne{
        return $this->hasMany(Ability::class);
    }
}
