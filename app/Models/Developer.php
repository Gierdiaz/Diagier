<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\{HasMany, HasOne};
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Developer extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'github',
        'bio',
        'technologies',
        'college',
        'course',
        'certifications',
        'company',
        'level',
        'city',
        'state',
        'country',
        'work_mode',
    ];

    public function project(): HasOne
    {
        return $this->hasOne(Project::class);
    }

    public function manager(): HasMany
    {
        return $this->hasMany(Manager::class);
    }

    public function managers(): HasMany
    {
        return $this->hasMany(Manager::class);
    }
}
