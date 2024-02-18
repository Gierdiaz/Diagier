<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<nav class="navbar navbar-expand-lg" style="background-color: rgb(150, 95, 24); color: white; mb-5">
    <div class="container">
        <a class="navbar-brand text-white" href="{{ route('main') }}">TechSphere</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0"></ul>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <div class="nav-link dropdown-toggle text-white" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </div>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('wait')}}">Profile</a></li>
                        <li><a class="dropdown-item" href="{{ route('wait')}}">Settings</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<script>
    $(document).ready(function(){
        // Inicializa o dropdown
        $('.dropdown-toggle').dropdown();

        // Fecha o dropdown quando clicar fora dele
        $(document).click(function(e) {
            // Verifica se o elemento clicado não está dentro do dropdown
            if (!$(e.target).closest('.dropdown').length) {
                $('.dropdown-menu').removeClass('show');
            }
        });
    });
</script>

