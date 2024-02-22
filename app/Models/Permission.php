<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes
};

class Permission extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'access',
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
