<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\{HasMany, HasOne};

use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use App\Models\Developer;
use App\Models\Client;

class Dashboard extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [

    ];

    public function returnData(): HasOne
    {
        return $this->hasOne(Permission::class);
    }

}



