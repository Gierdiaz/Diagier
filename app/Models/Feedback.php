<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\{Model, SoftDeletes};

class Feedback extends Model
{
    use HasFactory;
    use SoftDeletes;
    use HasUuids;

    protected $table = 'feedbacks';

    protected $fillable = [
        'id',
        'comment',
        'reviewer',
        'attachments',
        'rating',
        'feedback',
        'task_id',
        'user_id',
    ];

    public function task(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }

}
