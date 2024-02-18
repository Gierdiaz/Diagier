<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - Diagier</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #000; /* Alterado para preto */
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            position: relative;
        }

        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8); /* Alterado para preto com transparência */
            z-index: -1;
            opacity: 0.6; /* Ajuste de opacidade */
        }

        .container {
            max-width: 600px;
            margin: 150px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.5); /* Alterado para um branco com transparência */
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 10px;
            color: #555;
        }

        input {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ddd;
            transition: border-color 0.3s;
        }

        input:focus {
            outline: none;
            border-color: #6c63ff;
        }

        button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            background-color: #6c63ff;
            color: #fff;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #564dff;
        }

        .error-message {
            color: #ff0000;
            margin-top: 5px;
        }

        .redirect-link {
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div id="particles-js"></div>

    <div class="container">
        <h2>Registrar Usuário</h2>

        @if(session('status'))
            <p>{{ session('status') }}</p>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <label for="name">Nome:</label>
            <input type="text" name="name" value="{{ old('name') }}" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="{{ old('email') }}" required>
            
            <label for="password">Senha:</label>
            <input type="password" name="password" required>

            <label for="password_confirmation">Confirmar Senha:</label>
            <input type="password" name="password_confirmation" required>

            <button type="submit">Registrar</button>
        </form>

        <div class="redirect-link">
            Já possui uma conta? <a href="{{ route('login') }}">Faça login aqui</a>.
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script>
        particlesJS('particles-js', {
            "particles": {
                "number": {
                    "value": 80,
                    "density": {
                        "enable": true,
                        "value_area": 800
                    }
                },
                "color": {
                    "value": "#ffffff"
                },
                "shape": {
                    "type": "circle",
                    "stroke": {
                        "width": 0,
                        "color": "#000000"
                    },
                    "polygon": {
                        "nb_sides": 5
                    },
                    "image": {
                        "src": "img/github.svg",
                        "width": 100,
                        "height": 100
                    }
                },
                "opacity": {
                    "value": 0.8, /* Ajuste de opacidade */
                    "random": false,
                    "anim": {
                        "enable": false,
                        "speed": 1,
                        "opacity_min": 0.1,
                        "sync": false
                    }
                },
                "size": {
                    "value": 3,
                    "random": true,
                    "anim": {
                        "enable": false,
                        "speed": 40,
                        "size_min": 0.1,
                        "sync": false
                    }
                },
                "line_linked": {
                    "enable": true,
                    "distance": 150,
                    "color": "#ffffff",
                    "opacity": 0.4,
                    "width": 1
                },
                "move": {
                    "enable": true,
                    "speed": 6,
                    "direction": "none",
                    "random": false,
                    "straight": false,
                    "out_mode": "out",
                    "bounce": false,
                    "attract": {
                        "enable": false,
                        "rotateX": 600,
                        "rotateY": 1200
                    }
                }
            },
            "interactivity": {
                "detect_on": "canvas",
                "events": {
                    "onhover": {
                        "enable": true,
                        "mode": "repulse"
                    },
                    "onclick": {
                        "enable": true,
                        "mode": "push"
                    },
                    "resize": true
                },
                "modes": {
                    "grab": {
                        "distance": 400,
                        "line_linked": {
                            "opacity": 1
                        }
                    },
                    "bubble": {
                        "distance": 400,
                        "size": 40,
                        "duration": 2,
                        "opacity": 8,
                        "speed": 3
                    },
                    "repulse": {
                        "distance": 200,
                        "duration": 0.4
                    },
                    "push": {
                        "particles_nb": 4
                    },
                    "remove": {
                        "particles_nb": 2
                    }
                }
            },
            "retina_detect": true
        });
    </script>
</body>
</html>
