<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechSphere - Explorando o Universo da Tecnologia</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #000;
            margin: 0;
            padding: 0;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #particles-js {
            position: absolute;
            width: 100%;
            height: 100%;
            background-color: transparent;
            z-index: 1;
        }

        .container {
            position: relative;
            text-align: center;
            z-index: 2;
            color: #fff;
        }

        h1 {
            font-size: 3.5rem; /* Reduzindo o tamanho da fonte do título */
            margin-bottom: 30px;
        }

        .btn-container {
            position: absolute; /* Posicionando os botões absolutamente */
            top: 20px; /* Posicionamento do topo */
            right: 20px; /* Posicionamento da direita */
            z-index: 2;
        }

        .btn {
            display: inline-block;
            padding: 8px 16px; /* Reduzindo o tamanho do padding */
            border: none;
            border-radius: 20px; /* Reduzindo o raio da borda */
            background-color: transparent; /* Fundo transparente */
            color: #ff6b6b; /* Cor do texto */
            font-size: 0.9rem; /* Reduzindo o tamanho da fonte */
            text-decoration: none;
            margin-right: 10px; /* Espaçamento entre os botões */
            transition: background-color 0.3s, color 0.3s; /* Efeito de transição */
        }

        .btn:hover {
            background-color: #ff6b6b; /* Cor de fundo no hover */
            color: #fff; /* Cor do texto no hover */
        }

        .btn-secondary {
            border: 2px solid #ff6b6b; /* Cor da borda */
        }

    </style>
</head>
<body>
    <div id="particles-js"></div>
    <div class="btn-container"> <!-- Nova div para conter os botões -->
        <a class="btn" href="{{ route('register') }}">Registrar</a>
        <a class="btn btn-secondary" href="{{ route('login') }}">Login</a>
    </div>
    <div class="container">
        <h1>TechSphere - Explorando o Universo da Tecnologia</h1>
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
                    "value": 0.5,
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
