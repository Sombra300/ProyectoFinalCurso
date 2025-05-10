<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubClase extends Model
{
    public function clase(): BelongsTo{
        return $this->BelongsTo(Clase::class);
    }

    public function abilitys(): HasMany{
        return $this->hasMany(Ability::class);
    }

    public function spels(): HasMany{
        return $this->hasMany(Spel::class);
    }
}
