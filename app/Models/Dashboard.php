<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\{HasMany, HasOne};
use Illuminate\Support\Facades\DB;

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

    public static function returnData()
    {
        $data['tasksByProject']         = Project::select('name')->withCount('tasks')->get();

        $data_aux['tasksByProject']['tasks'] = [];
        $data_aux['tasksByProject']['quantities'] = [];

        for($i = 0; $i < count($data['tasksByProject']); $i++){
            $data_aux['tasksByProject']['tasks'][] = $data['tasksByProject'][$i]['name'];
            $data_aux['tasksByProject']['quantities'][] = $data['tasksByProject'][$i]['tasks_count'];
        }

        $data['tasksByProject']['tasks']      = $data_aux['tasksByProject']['tasks'];
        $data['tasksByProject']['quantities'] = $data_aux['tasksByProject']['quantities'];



        $data['collaboratorsByProject'] = Project::join('developers','projects.developer_id','=','developers.id')
                                                   ->select('projects.name','projects.id', DB::raw('COUNT(developers.id) as count_devs'))
                                                   ->groupBy('projects.name','projects.id')
                                                   ->get();

        $data_aux['collaboratorsByProject']['collabs'] = [];
        $data_aux['collaboratorsByProject']['quantities'] = [];

        for($i = 0; $i < count($data['collaboratorsByProject']); $i++){
            $data_aux['collaboratorsByProject']['collabs'][]      = $data['collaboratorsByProject'][$i]['name'];
            $data_aux['collaboratorsByProject']['quantities'][]   = $data['collaboratorsByProject'][$i]['count_devs'];
        }

        $data['collaboratorsByProject']['collabs']      = $data_aux['collaboratorsByProject']['collabs'];
        $data['collaboratorsByProject']['quantities']   = $data_aux['collaboratorsByProject']['quantities'];


        $data['clientsByProject']       = Project::join('clients','projects.client_id','=','clients.id')
                                                   ->select('projects.name','projects.id', DB::raw('COUNT(clients.id) as count_clients'))
                                                   ->groupBy('projects.name','projects.id')
                                                   ->get();
        $data_aux['clientsByProject']['clients']    = [];
        $data_aux['clientsByProject']['quantities'] = [];

        for($i = 0; $i < count($data['clientsByProject']); $i++){
            $data_aux['clientsByProject']['clients'][]      = $data['clientsByProject'][$i]['name'];
            $data_aux['clientsByProject']['quantities'][]   = $data['clientsByProject'][$i]['count_clients'];
        }

        $data['clientsByProject']['clients']      = $data_aux['clientsByProject']['clients'];
        $data['clientsByProject']['quantities']   = $data_aux['clientsByProject']['quantities'];

        //um dev pode ser outro tipo de stakeholder.
        $data['stakeholdersByProject']  = Project::join('developers','projects.developer_id','=','developers.id')
                                                  ->select('projects.name','projects.id', DB::raw('COUNT(developers.id) as count_stakes'))
                                                  ->groupBy('projects.name','projects.id')
                                                  ->get();

        $data_aux['stakeholdersByProject']['stakeholders']   = [];
        $data_aux['stakeholdersByProject']['quantities']     = [];

        for($i = 0; $i < count($data['stakeholdersByProject']); $i++){
            $data_aux['stakeholdersByProject']['stakeholders'][] = $data['stakeholdersByProject'][$i]['name'];
            $data_aux['stakeholdersByProject']['quantities'][]   = $data['stakeholdersByProject'][$i]['count_stakes'];
        }

        $data['stakeholdersByProject']['stakeholders']  = $data_aux['stakeholdersByProject']['stakeholders'];
        $data['stakeholdersByProject']['quantities']    = $data_aux['stakeholdersByProject']['quantities'];

        $data['Projects'] = Project::count();
        $data['tasks']    = Task::count();
        $data['collabs']  = Developer::count();
        $data['clients']  = Client::count();
        $data['stakes']   = Developer::count();

        return $data;
    }

}



