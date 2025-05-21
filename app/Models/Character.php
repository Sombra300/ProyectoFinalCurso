<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Character extends Model
{
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function race(): BelongsTo{
        return $this->belongsTo(Race::class);
    }

    public function background(): BelongsTo{
        return $this->belongsTo(Background::class);
    }

    public function clase(): BelongsToMany{
        return $this->belongsToMany(Clase::class);
    }

    public function items(): BelongsToMany{
        return $this->belongsToMany(Item::class);
    }

    public function lenguages(): BelongsToMany{
        return $this->belongsToMany(Lenguage::class);
    }

    public function spells(): HasMany{
        return $this->hasMany(Spell::class);
    }

    public function likes():HasMany{
        return $this->hasMany(Like::class);
    }

}
