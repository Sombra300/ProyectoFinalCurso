<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Clase extends Model
{
    public function subclases(): HasMany{
        return $this->hasMany(SubClase::class);
    }

    public function abilitys(): HasMany{
        return $this->hasMany(Ability::class)->withPivot('lvl');
    }

    public function spells(): HasMany{
        return $this->hasMany(Spell::class)->withPivot('lvl');
    }

    public function characters(): BelongsToMany{
        return $this->belongsToMany(Character::class);
    }
}
