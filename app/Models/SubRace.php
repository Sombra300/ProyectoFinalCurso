<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubRace extends Model
{
    public function race(): BelongsTo{
        return $this->BelongsTo(Race::class);
    }
}
