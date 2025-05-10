<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SubRace extends Model
{
    public function race(): BelongsTo{
        return $this->BelongsTo(Race::class);
    }

    public function ability(): HasMany{
        return $this->hasMany(Ability::class);
    }

    public function spels(): HasMany{
        return $this->hasMany(Spel::class);
    }
}
