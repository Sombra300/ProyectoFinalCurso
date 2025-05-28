<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Background extends Model
{
    public function character(): HasMany{
        return $this->hasMany(Character::class);
    }

    public function lenguage()
    {
        return $this->belongsTo(Lenguage::class);
    }
}
