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
    protected $dates = ['deleted_at'];

    protected $hidden = [
        'created_at','updated_at'
    ];

    protected $fillable = [
        'project_id',
        'developer_id',
    ];

    public static function listProjectDevelopers($project_id)
    {
        $projectDevelopers =    DeveloperProject::
                                join('developers', 'developer_project.developer_id', '=', 'developers.id')
                                ->select('developers.id as developer_id')
                                ->where('developer_project.project_id', '=', $project_id)
                                ->when($project_id, function ($query, $project_id) {
                                    return $query->where('developer_project.project_id', $project_id);
                                })
                                ->get();
        return $projectDevelopers;
    }

    public static function delete_developers($project)
    {
        $dropped = DeveloperProject::where('developer_project.project_id', '=', $project)->forceDelete();
        return $dropped;
    }




}
