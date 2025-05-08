<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Clase extends Model
{
    public function subclase(): HasMany{
        return $this->hasMany(SubClase::class);
    }
}
