<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Feedbacks</title>
</head>
<body>
    <h1>Lista de Feedbacks</h1>

    <ul>
        @foreach($feedbacks as $feedback)
            <li>
                <strong>Comentário:</strong> {{ $feedback->comment }}<br>
                <strong>Avaliador:</strong> {{ $feedback->reviewer }}<br>
                <strong>Anexos:</strong> {{ $feedback->attachments }}<br>
                <strong>Avaliação:</strong> {{ $feedback->rating }}<br>
                <strong>Tipo de Feedback:</strong> {{ $feedback->feedback }}<br>
                <strong>Tarefa:</strong> {{ $feedback->task->name }}<br>
            </li>
            <br>
        @endforeach
    </ul>
</body>
</html>
