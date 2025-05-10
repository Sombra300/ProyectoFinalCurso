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
        return $this->BelongsTo(Character::class);
    }

    public function race(): BelongsTo{
        return $this->BelongsTo(Race::class);
    }

    public function background(): BelongsTo{
        return $this->BelongsTo(Background::class);
    }

    public function clase(): BelongsToMany{
        return $this->BelongsTo(Clase::class);
    }

    public function items(): BelongsToMany{
        return $this->BelongsTo(Item::class);
    }

    public function lenguages(): BelongsToMany{
        return $this->BelongsTo(Lenguage::class);
    }

    public function spels(): HasMany{
        return $this->hasMany(Spel::class);
    }

}
