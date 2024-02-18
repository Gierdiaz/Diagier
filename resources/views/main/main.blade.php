<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Roboto:wght@300&family=Rubik:wght@300&display=swap" rel="stylesheet">
</head> 
<body>
    <header id="header">
        <div class="nav-logo">
            <a href="{{ route('main') }}">TechSphere</a>
        </div>
        <nav class="nav-bar">  
            <div>
                <a href="{{ route('developers.index') }}">Desenvolvedores</a>
                <a href="{{ route('projects.index') }}">Projetos</a>
                <a href="{{ route('tasks.index') }}">Tarefas</a>
                <a href="{{ route('feedbacks.index') }}">Feedbacks</a>
                @auth
                    <a href="{{ route('logout') }}">Logout</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                @endauth
            </div>
        </nav>
    </header>

    <main style="position: relative;">
        <img src="{{ asset('img/ti.jpg') }}" alt="Descrição da imagem">
    </main>

</div>
    <footer id="footer">
        <div  class="row">
            <div class="footer-content col-md">
                <a class="footer-logo">Tech Sauce</a>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi ut reprehenderit ipsum laudantium debitis ab ex, neque non at est laborum numquam, sint recusandae eius</p>
                <div class="icons">
                    <a href="#"><i class='bx bxl-facebook-circle'></i></a>
                    <a href="#"><i class='bx bxl-instagram-alt'></i></a>
                    <a href="#"><i class='bx bxl-tiktok'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                </div>
            </div>
            <div class="footer-content col-md">
                <h4>Project</h4>
                <li><a href="#">Web Development</a></li>
                <li><a href="#">Mobile Apps</a></li>
                <li><a href="#">Software Solutions</a></li>
                <li><a href="#">Tech Support</a></li>
            </div>
            <div class="footer-content col-md">
                <h4>Company</h4>
                <li><a href="#">Mission</a></li>
                <li><a href="#">Vision</a></li>
                <li><a href="#">Values</a></li>
                <li><a href="#">Careers</a></li>
            </div>
            <div class="footer-content col-md">
                <h4>Movement</h4>
                <li><a href="#">Open Source</a></li>
                <li><a href="#">Community</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Blog</a></li>
            </div>
            <div class="footer-content col-md">
                <h4>Help</h4>
                <li><a href="#">FAQs</a></li>
                <li><a href="#">Support</a></li>
                <li><a href="#">Contact</a></li>
            </div>
        </div>
    </footer>
    <div class="sub-footer">
        <p>Copyright &copy;2024 Tech Sauce. Designed by <span>Állison Diaz</span> All Rights Reserved</p>
    </div>

    <script src="https://unpkg.com/boxicons@2.1.3/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>