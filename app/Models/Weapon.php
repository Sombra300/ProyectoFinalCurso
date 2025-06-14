<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Weapon extends Model
{
    public function item(): BelongsTo{
        return $this->belongsTo(Item::class);
    }
}
