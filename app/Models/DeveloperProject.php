<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};


class DeveloperProject extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuids;

    protected $table = 'developer_project';

    protected $fillable = [
        'project_id',
        'developer_id',
    ];




}
