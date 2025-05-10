<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Clase extends Model
{
    public function subclases(): HasMany{
        return $this->hasMany(SubClase::class);
    }

    public function abilitys(): HasMany{
        return $this->hasMany(Ability::class);
    }

    public function spels(): HasMany{
        return $this->hasMany(Spel::class);
    }
}
