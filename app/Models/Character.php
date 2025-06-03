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

    public function likes(): BelongsToMany{
        return $this->belongsToMany(User::class, 'likes');
    }

    public function race(): BelongsTo{
        return $this->belongsTo(Race::class);
    }

    public function background(): BelongsTo{
        return $this->belongsTo(Background::class);
    }

    public function clases(): BelongsToMany{
        return $this->belongsToMany(Clase::class)->withPivot('lvl', 'sub_clase_id',
        'subclase_name', 'modComp');
    }

    public function items(): BelongsToMany{
        return $this->belongsToMany(Item::class)->withPivot('cantidad');
    }

}
