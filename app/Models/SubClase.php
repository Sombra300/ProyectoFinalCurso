<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SubClase extends Model
{
    public function clase(): BelongsTo{
        return $this->BelongsTo(Clase::class);
    }
}
