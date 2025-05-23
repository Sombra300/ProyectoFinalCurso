<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Item extends Model
{
    public function armor(): HasOne{
        return $this->hasOne(Armor::class);
    }

    public function weapon(): HasOne{
        return $this->hasOne(Weapon::class);
    }

    public function characters(): BelongsToMany{
        return $this->belongsToMany(Character::class);
    }
}
