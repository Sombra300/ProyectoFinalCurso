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

    public function clase(): BelongsToMany{
        return $this->belongsToMany(Clase::class, 'clase_spell')->withPivot('lvl');
    }
}
