<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Desenvolvedor</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa; /* Cor de fundo menos chamativa */
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 50px;
            background-color: #fff; /* Cor de fundo do container */
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
            text-align: center;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
            color: #555;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ced4da;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus, input[type="email"]:focus {
            outline: none;
            border-color: #6c63ff;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Visualizar Desenvolvedor</h2>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" value="{{ $developer->name }}" readonly>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="{{ $developer->email }}" readonly>
            </div>
            <!-- Outros campos -->
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
