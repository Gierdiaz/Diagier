<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora&family=Roboto:wght@300&family=Rubik:wght@300&display=swap"
        rel="stylesheet">
    @vite('resources/css/app.css')
</head>

<body class="">

    <x-header class='font-inter' />

    <main>

        <div
            class="mx-auto mt-24 md:mt-48 flex relative w-11/12 max-w-screen-custom-xl flex-col md:flex-row gap-6 md:gap-0">

            <div class='basis-3/6 flex flex-col md:pr-12 relative'>
                <h2 class='text-4xl font-semibold md:mt-5 font-inter'>Gerencie seus projetos e equipes de forma pratica
                </h2>
                <p class='text-xl font-medium mt-8 font-inter'>Aqui na Diagier nós provemos o melhor ambiente para a sua
                    organização ou time, contamos com todas as ferramentas necessárias para fazer o seu projeto <span
                        class="text-cyan-500">decolar</span>.
                </p>
                @auth
                    <div class="relative mt-10 md:mt-14 self-start flex font-inter">
                        <a href="#"
                            class="px-4 py-3 w-auto self-start bg-cyan-500 text-white font-semibold text-xl tracking-wide relative z-10">
                            Trabalhe conosco
                        </a>
                        <div class="absolute inset-0 bg-cyan-300 opacity-20 z-0 w-full ml-3 h-full mt-2"></div>
                    </div>
                @else
                    <div class="relative mt-10 md:mt-14 self-start flex font-inter">
                        <a href="#"
                            class="px-4 py-3 w-auto self-start bg-cyan-500 text-white font-semibold text-xl tracking-wide relative z-10">
                            Trabalhe conosco
                        </a>
                        <div class="absolute inset-0 bg-cyan-300 opacity-20 z-0 w-full ml-3 h-full mt-2"></div>
                    </div>

                @endauth
            </div>
            <div class="basis-3/6 relative">
                <img src="{{ asset('img/hero_img.png') }}" alt="">
            </div>

            <img src="{{ asset('img/rocket-svgrepo-com.svg') }}" alt=""
                class="absolute w-1/2 opacity-5 mx-auto 
            top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 -mt-10">
        </div>

        <div class="flex relative flex-col gap-6 text-center mx-auto mt-48 w-11/12 max-w-screen-custom-xl">
            <h2 class="font-inter text-3xl font-semibold">Vantagens em utilizar o Diagier no seu projeto</h2>
            <div class="flex justify-center gap-8 flex-col md:flex-row">

                <div class="flex justify-center items-center gap-1"><img src="{{ asset('img/checkVector.svg') }}"
                        alt="" class="w-5"><span class="text-xl">Administração de equipes</span></div>
                <div class="flex justify-center items-center gap-1"><img src="{{ asset('img/checkVector.svg') }}"
                        alt="" class="w-5"><span class="text-xl">Tarefas destacadas</span></div>
                <div class="flex justify-center items-center gap-1"><img src="{{ asset('img/checkVector.svg') }}"
                        alt="" class="w-5"><span class="text-xl">Fácil gerenciamento de projeto</span></div>

            </div>

            <div class="flex flex-wrap gap-8">
                <div class="basis-80 grow text-left border-4 border-opacity-50 rounded-md pb-0 max-w-96 mx-auto">
                    <div class="pr-8 pl-8 pt-8">
                        <img src="{{ asset('img/gestao_projetos.png') }}" alt="" class="">
                        <h3 class="text-xl font-semibold my-4">Gestão de projetos</h3>
                        <p class="font-inter mb-8">Na Diagier, simplificamos a gestão de projetos por meio de
                            ferramentas intuitivas e um formato simplificado, garantindo eficiência e suporte aprimorado
                            aos projetos criados na plataforma.</p>
                    </div>
                    <div class="h-1 bg-black opacity-10"></div>
                    <a href="#" class="text-gray-800 font-medium ml-8 mt-8 mb-8 inline-block">Experimente a
                        plataforma</a>
                </div>
                <div class="basis-80 grow text-left border-4 border-opacity-50 rounded-md pb-0 max-w-96 mx-auto">
                    <div class="pr-8 pl-8 pt-8">
                        <img src="{{ asset('img/gestao_equipes.png') }}" alt="" class="">
                        <h3 class="text-xl font-semibold my-4">Gestão de equipes</h3>
                        <p class="font-inter mb-8">Na Diagier, simplificamos a gestão de projetos por meio de
                            ferramentas intuitivas e um formato simplificado, garantindo eficiência e suporte aprimorado
                            aos projetos criados na plataforma.</p>
                    </div>
                    <div class="h-1 bg-black opacity-10"></div>
                    <a href="#" class="text-gray-800 font-medium ml-8 mt-8 mb-8 inline-block">Experimente a
                        plataforma</a>
                </div>
                <div class="basis-80 grow text-left border-4 border-opacity-50 rounded-md pb-0 max-w-96 mx-auto">
                    <div class="pr-8 pl-8 pt-8">
                        <img src="{{ asset('img/interface_otimizada.png') }}" alt="" class="">
                        <h3 class="text-xl font-semibold my-4">Interfaces otimizadas</h3>
                        <p class="font-inter mb-8">Na Diagier, simplificamos a gestão de projetos por meio de
                            ferramentas intuitivas e um formato simplificado, garantindo eficiência e suporte aprimorado
                            aos projetos criados na plataforma.</p>
                    </div>
                    <div class="h-1 bg-black opacity-10"></div>
                    <a href="#" class="text-gray-800 font-medium ml-8 mt-8 mb-8 inline-block">Experimente a
                        plataforma</a>
                </div>
            </div>
        </div>

        <div class="text-center mx-auto mt-40 w-11/12 max-w-screen-custom-xl">
            <h2 class="font-inter text-3xl font-semibold">Planeje o seu projeto conosco</h2>

            <div class="mt-20 flex justify-between">
                <span>Analise</span>
                <span>Desenvolvimento</span>
                <span>Testes</span>
                <span>Entrega</span>
            </div>
            <div class="w-full bg-slate-600 h-3 rounded-lg mt-2 relative overflow-hidden">
                <div class="w-3/4 bg-slate-800 h-3 absolute left-0 top-0">
                </div>

            </div>

            <div class="flex flex-wrap justify-between gap-24 mx-auto mt-14 max-w-screen-custom-xl">
                <div class="basis-5/12 grow text-left border-1 border-black rounded-md px-8 py-10 relative min-w-80">
                    <div class="absolute -top-4 w-16 bg-white flex justify-center"><img
                            src="{{ asset('img/hierarchy-square-3.svg') }}" alt="" class="absoulte w-8">
                    </div>
                    <h4 class="text-xl font-semibold">Facilitamos os seus projetos e provemos suporte a todas as etapas
                        do projeto</h4>
                    <p class="mt-6">Planeje o seu projeto conosco e simplifique cada etapa do processo, desde a
                        concepção até a entrega. Com uma plataforma intuitiva e suporte especializado, facilitamos suas
                        ideias e resolvemos desafios ao longo do caminho. Defina metas, atribua tarefas, acompanhe o
                        progresso e colabore com eficiência. Junte-se a nós para alcançar seus objetivos com confiança.
                    </p>
                </div>
                <div class="basis-5/12 grow text-left border-1 border-black rounded-md px-8 py-10 relative min-w-80">
                    <div class="absolute -top-4 w-16 bg-white flex justify-center"><img
                            src="{{ asset('img/task-square.svg') }}" alt="" class="absoulte w-8"></div>
                    <h4 class="text-xl font-semibold">Facilitamos os seus projetos e provemos suporte a todas as etapas
                        do projeto</h4>
                    <p class="mt-6">Planeje o seu projeto conosco e simplifique cada etapa do processo, desde a
                        concepção até a entrega. Com uma plataforma intuitiva e suporte especializado, facilitamos suas
                        ideias e resolvemos desafios ao longo do caminho. Defina metas, atribua tarefas, acompanhe o
                        progresso e colabore com eficiência. Junte-se a nós para alcançar seus objetivos com confiança.
                    </p>
                </div>
            </div>

        </div>

        <div class="mx-auto mt-16 w-11/12 max-w-screen-custom-xl text-center">
            <h2 class="font-bold text-3xl mb-12">Por que continuar a perder tempo no gerenciamento de projetos?
                Utilize-nos e agilize tudo!</h2>
            <img src="{{ asset('img/actionImg.png') }}" alt="" class="w-full rounded-2xl">
            <a href="#"
                class="text-gray-800 font-medium ml-8 mt-6 mb-8 inline-block tracking-custom-lg text-lg">Experimente
                a plataforma</a>
        </div>

    </main>

    <script src="https://unpkg.com/boxicons@2.1.3/dist/boxicons.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
    <script>
        const openModal = document.getElementById('openModal');
        const closeModal = document.getElementById('closeModal');
        const headerContent = document.getElementById('headerContent');
        const classesToAdd = ['flex-col', 'gap-4', 'text-4xl', 'items-center', 'justify-center', 'space-x-2', 'text-2xl',
            'font-semibold', 'top-0', 'left-0', 'flex', 'min-h-full', 'min-w-full', 'fixed', 'z-50', 'bg-cyan-500'
        ];

        openModal.addEventListener('click', () => {
            headerContent.classList.add(...classesToAdd);
            headerContent.classList.remove('hidden');
            closeModal.classList.remove('hidden');
        });

        closeModal.addEventListener('click', () => {
            headerContent.classList.remove(...classesToAdd);
            headerContent.classList.add('hidden')
            closeModal.classList.add('hidden')
        });
    </script>
</body>

</html>
