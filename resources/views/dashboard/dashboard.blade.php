@extends('layout.layout')

@section('content')
@vite('resources/css/app.css')
<body class="">
    <main>

        <div class="bg-white py-20 sm:py-20" >
            <div class="mx-auto max-w-7xl px-6 lg:px-8">
              <dl class="grid grid-cols-1 gap-x-8 gap-y-16 text-center lg:grid-cols-5">
                <div class="mx-auto flex max-w-xs flex-col gap-y-4" >
                  <dt class="text-base leading-7 text-gray-600" style="font-family: Ubuntu;">Projetos</dt>
                  <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl" style="font-family: Ubuntu;">{{ $data_2['Projects'] }}</dd>
                </div>
                <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                  <dt class="text-base leading-7 text-gray-600" style="font-family: Ubuntu;">Tarefas</dt>
                  <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl" style="font-family: Ubuntu;"> {{ $data_2['tasks'] }} </dd>
                </div>
                <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                  <dt class="text-base leading-7 text-gray-600" style="font-family: Ubuntu;">Colaboradores</dt>
                  <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl" style="font-family: Ubuntu;">{{ $data_2['collabs'] }}</dd>
                </div>
                <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                    <dt class="text-base leading-7 text-gray-600" style="font-family: Ubuntu;">Clientes</dt>
                    <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl" style="font-family: Ubuntu;">{{ $data_2['clients'] }}</dd>
                </div>
                    <div class="mx-auto flex max-w-xs flex-col gap-y-4">
                    <dt class="text-base leading-7 text-gray-600" style="font-family: Ubuntu;">Stakeholders</dt>
                    <dd class="order-first text-3xl font-semibold tracking-tight text-gray-900 sm:text-5xl" style="font-family: Ubuntu;">{{ $data_2['stakes'] }}</dd>
                </div>
              </dl>
            </div>
        <div class="mx-auto mt-20 md:mt-20 flex relative w-11/12 max-w-screen-custom-xl flex-col md:flex-row gap-6 md:gap-0">
            <div class='basis-3/6 flex flex-col md:pr-12 relative'>
                <canvas id="pieChart1" width=15% height=15%></canvas>
            </div>

            <div class='basis-3/6 flex flex-col md:pr-12 relative'>
                <canvas id="myChart2" width=20% height=20%></canvas>
            </div>
        </div>

        <div class="mx-auto mt-20 md:mt-20 flex relative w-11/12 max-w-screen-custom-xl flex-col md:flex-row gap-6 md:gap-0">
            <div class='basis-3/6 flex flex-col md:pr-12 relative'>
                <canvas id="myChart3" width=20% height=20%></canvas>
            </div>

            <div class='basis-3/6 flex flex-col md:pr-12 relative'>
                <canvas id="myChart4" width=20% height=20%></canvas>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>


    function corAleatoria() {
        let r = Math.floor(Math.random() * 256);
        let g = Math.floor(Math.random() * 256);
        let b = Math.floor(Math.random() * 256);

        return `rgb(${r}, ${g}, ${b})`;
    }

    let arrayDoBackend = @json($data_2['tasksByProject']['tasks']);
    console.log(arrayDoBackend);
    let coresEscolhidas = [];
    let corAnterior = null;

    arrayDoBackend.forEach(() => {
        // Escolhe uma nova cor aleatória
        let novaCor = corAleatoria();

        // Garante que cores adjacentes não sejam iguais
        while (novaCor === corAnterior) {
            novaCor = corAleatoria();
        }

        coresEscolhidas.push(novaCor);
        corAnterior = novaCor;
    });
    
      var ctx1 = document.getElementById('pieChart1').getContext('2d');
          ctx1.width = '15%';
          ctx1.height = '15%';
          var myChart = new Chart(ctx1, {
            type: 'pie',
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: true,
                        text: 'Tarefas por Projeto'
                    }
                }
            },
            data: {
                labels: @json($data_2['tasksByProject']['tasks']),
                datasets: [{
                    data: @json($data_2['tasksByProject']['quantities']),
                    backgroundColor: coresEscolhidas,
                    borderColor: coresEscolhidas,
                    borderWidth: 1
                }]
            }
        });

      const ctx2 = document.getElementById('myChart2').getContext('2d');

      new Chart(ctx2, {
        type: 'bar',
        data: {
          labels: @json($data_2['collaboratorsByProject']['collabs']),
          datasets: [{
            label: 'Quantidade',
            data:  @json($data_2['collaboratorsByProject']['quantities']),
            backgroundColor: coresEscolhidas,
            borderColor: coresEscolhidas,
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          },
          plugins:{
                title: {
                    display: true,
                    text: 'Colaboradores por Projeto'
                }
            }
        }
      });

      const ctx3 = document.getElementById('myChart3').getContext('2d');
      new Chart(ctx3, {
        type: 'bar',
        data: {
          labels: @json($data_2['clientsByProject']['clients']),
          datasets: [{
            label: 'Quantidade',
            data: @json($data_2['clientsByProject']['quantities']),
            backgroundColor: coresEscolhidas,
            borderColor: coresEscolhidas,
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          },
          plugins:{
                title: {
                    display: true,
                    text: 'Clientes por Projeto'
                }
            }
        }
      });

      const ctx4 = document.getElementById('myChart4').getContext('2d');
      new Chart(ctx4, {
        type: 'bar',
        data: {
          labels: @json($data_2['stakeholdersByProject']['stakeholders']),
          datasets: [{
            label: 'Quantidade',
            data: @json($data_2['stakeholdersByProject']['quantities']),
            backgroundColor: coresEscolhidas,
            borderColor: coresEscolhidas,
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          },
          plugins:{
                title: {
                    display: true,
                    text: 'Stakeholders por Projeto'
                }
            }
        }
      });

    </script>
</body>

@endsection
