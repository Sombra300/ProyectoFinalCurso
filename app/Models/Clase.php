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

    public function abilities(): BelongsToMany{
        return $this->belongsToMany(Ability::class, 'ability_clase')->withPivot('lvl');
    }

    public function spells(): BelongsToMany{
        return $this->hasMany(Spell::class, 'clase_spell')->withPivot('lvl');
    }

    public function characters(): BelongsToMany{
        return $this->belongsToMany(Character::class);
    }
}
