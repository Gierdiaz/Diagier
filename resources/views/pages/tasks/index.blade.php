<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Tarefas</title>
</head>
<body>
    <h1>Lista de Tarefas</h1>

    <ul>
        @foreach($tasks as $task)
            <li>
                <strong>Nome:</strong> {{ $task->name }}<br>
                <strong>Descrição:</strong> {{ $task->description }}<br>
                <strong>Comentários:</strong> {{ $task->comments }}<br>
                <strong>Sprint:</strong> {{ $task->sprint }}<br>
                <strong>Prioridade:</strong> {{ $task->priority }}<br>
                <strong>Status:</strong> {{ $task->status }}<br>
                <strong>Desenvolvedor:</strong> {{ $task->developer->name }}<br>
                <strong>Projeto:</strong> {{ $task->project->name }}<br>
            </li>
            <br>
        @endforeach
    </ul>
</body>
</html>
