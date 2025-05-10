<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Armor extends Model
{
    public function item(): BelongsTo{
        return $this->BelongsTo(Item::class);
    }
}
