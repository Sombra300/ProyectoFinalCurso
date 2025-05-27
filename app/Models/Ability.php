<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ability extends Model
{
    public function clases(): BelongsToMany{
        return $this->belongsToMany(Clase::class, 'ability_clase')->withPivot('lvl');
    }

    public function subClase(): BelongsToMany{
        return $this->belongsToMany(Clase::class, 'ability_subClase')->withPivot('lvl');
    }

    public function race(): BelongsToMany {
        return $this->BelongsTo(Race::class);
    }
}
