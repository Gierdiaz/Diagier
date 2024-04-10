@extends('layout.layout')

@section('content')
<body class="">
    <main>
        <div class="mx-auto mt-24 md:mt-48 flex relative w-11/12 max-w-screen-custom-xl flex-col md:flex-row gap-6 md:gap-0">
            <div class='basis-3/6 flex flex-col md:pr-12 relative'>
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
      const ctx = document.getElementById('myChart');

      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
          datasets: [{
            label: '# of Votes',
            data: [12, 19, 3, 5, 2, 3],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    </script>
</body>

@endsection
