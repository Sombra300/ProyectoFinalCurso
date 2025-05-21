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
        return $this->hasMany(Ability::class);
    }

    public function spells(): HasMany{
        return $this->hasMany(Spell::class);
    }

    public function characters(): BelongsToMany{
        return $this->belongsToMany(Character::class)->withPivot('lvl', 'subclase_id');
    }
}
