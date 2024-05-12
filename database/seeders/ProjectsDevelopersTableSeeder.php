<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Developer;
use Illuminate\Support\Str;
use Ramsey\Uuid\Uuid;

class ProjectsDevelopersTableSeeder extends Seeder
{
    public function run()
    {
        // Obtém todos os projetos e desenvolvedores existentes - Aloca varios devs em um projeto
        /*$projects   = Project::pluck('id')->toArray();
        $developers = Developer::pluck('id')->toArray();*/

        // Percorre cada projeto e associa desenvolvedores aleatórios
        //foreach ($projects as $projectId) {
            // Seleciona aleatoriamente um desenvolvedor para associar
            //$developersAssociates = array_rand(array_flip($developers));
            /*if (!empty($developersAssociates)) {
                if ($project = Project::find($projectId)) {*/
                    // Associa os desenvolvedores ao projeto
                   // $project->developers()->attach($developersAssociates, ['id' => Uuid::uuid4()->toString()]);
                //}
            //}
        //}

        //permitir de fato a relação vários para vários
        $projects   = Project::pluck('id')->toArray();
        $developers = Developer::pluck('id')->toArray();

        // Percorre cada projeto e associa desenvolvedores aleatórios
        foreach ($projects as $projectId) {
            // Seleciona aleatoriamente um desenvolvedor para associar
            $developersAssociates = array_rand(array_flip($developers));
            $projectsTest = array_rand(array_flip($projects));
            if (!empty($developersAssociates) && !empty($projectsTest)) {
                if ($project = Project::find($projectsTest)) {
                    // Associa os desenvolvedores ao projeto
                    $project->developers()->attach($developersAssociates, ['id' => Uuid::uuid4()->toString()]);
                }
            }
        }
    }
}

