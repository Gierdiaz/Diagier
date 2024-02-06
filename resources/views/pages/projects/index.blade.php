<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projetos do Desenvolvedor</title>
</head>
<body>
    <h2>Projetos do Desenvolvedor - {{ $developer->name }}</h2>

    @if(!is_null($projects) && count($projects) > 0)
        <ul>
            @foreach($projects as $project)
                <li>
                    <strong>Nome do Projeto:</strong> {{ $project->name }}<br>
                    <strong>Descrição:</strong> {{ $project->description }}<br>
                    <strong>Cliente:</strong> {{ $project->client }}<br>
                    <strong>Tecnologias:</strong> {{ $project->technologies }}<br>
                    <strong>Data de Início:</strong> {{ $project->start_date }}<br>
                    <strong>Data de Término:</strong> {{ $project->end_date }}<br>
                    <strong>Orçamento:</strong> R$ {{ number_format($project->budget, 2, ',', '.') }}<br>
                    <strong>Status:</strong> {{ ucfirst($project->status) }}<br>
                </li>
            @endforeach
        </ul>
    @else
        <p>O desenvolvedor não está associado a nenhum projeto.</p>
    @endif
</body>
</html>
