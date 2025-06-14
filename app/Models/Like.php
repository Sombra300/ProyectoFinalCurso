<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Like extends Model
{

    public function user():BelongsTo {
        return $this->belongsTo(User::class);
    }
    public function character():BelongsTo {
        return $this->belongsTo(Character::class);
    }
}
