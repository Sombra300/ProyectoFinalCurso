<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Ability extends Model
{
    public function clase(): BelongsToMany{
        return $this->BelongsTo(Clase::class);
    }

    public function subClase(): BelongsToMany{
        return $this->BelongsTo(SubClase::class);
    }

    public function race(): BelongsToMany {
        return $this->BelongsTo(Race::class);
    }
}
