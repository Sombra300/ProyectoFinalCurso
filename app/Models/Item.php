<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Item extends Model
{
    public function armor(): HasMany{
        return $this->hasMany(Armor::class);
    }

    public function weapon(): HasMany{
        return $this->hasMany(Weapon::class);
    }
}
