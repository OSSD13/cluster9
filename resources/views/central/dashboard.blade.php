@extends('layout.layoutcentral')

@section('content')
<div class="category-area">
    <h2> จำนวนอาสาสมัครที่เข้าร่วมในแต่ละปี </h2>
    <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');
    const labels = @json($labels); // labels จาก Controller
    const data = @json($data);     // data จาก Controller

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'จำนวนอาสาสมัครที่เข้าร่วมในแต่ละปี',
                data: data,
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

@endsection
