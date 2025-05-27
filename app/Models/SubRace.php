<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SubRace extends Model
{
    public function race(): BelongsTo{
        return $this->BelongsTo(Race::class);
    }

    public function abilities(): BelongsToMany {
        return $this->belongsToMany(Ability::class, 'ability_sub_race');
    }
}
