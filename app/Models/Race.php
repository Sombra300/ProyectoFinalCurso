<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Race extends Model
{
    public function character(): HasMany{
        return $this->hasMany(Character::class);
    }

    public function subrace(): HasMany{
        return $this->hasMany(SubRace::class);
    }
}
