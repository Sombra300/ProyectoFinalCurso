<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SubClase extends Model
{
    public function clase(): BelongsTo{
        return $this->BelongsTo(Clase::class);
    }

    public function abilities(): BelongsToMany {
        return $this->belongsToMany(Ability::class, 'ability_subClase')->withPivot('lvl');
    }
}
