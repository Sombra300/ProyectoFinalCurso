<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Item extends Model
{
    public function armor(): HasOne{
        return $this->hasMany(Armor::class);
    }

    public function weapon(): HasOne{
        return $this->hasMany(Weapon::class);
    }
}
