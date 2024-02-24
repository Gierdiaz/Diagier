<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('css/2fa.css') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuração de Autenticação de Dois Fatores</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div id="particles-js"></div>

    <div class="container">
        <h2>Configuração de Autenticação de Dois Fatores</h2>

        <div class="qr-code-container">
            {!! $QR_Image !!}
        </div>
        
        <form method="POST" action="{{ route('2fa.enable') }}">
            @csrf
        
            <div class="form-group">
                <label for="2fa_code">Código de Autenticação de Dois Fatores:</label>
                <input id="2fa_code" type="text" class="form-control @error('2fa_code') is-invalid @enderror" name="2fa_code" required autofocus>
        
                @error('2fa_code')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        
            <button type="submit" class="btn btn-primary">Ativar Autenticação de Dois Fatores</button>
        </form>

        <div class="redirect-link">
            Já configurou a autenticação de dois fatores? <a href="{{ route('login') }}">Ir para o painel</a>.
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="{{ asset('js/particles.js') }}"></script>
</body>
</html>
