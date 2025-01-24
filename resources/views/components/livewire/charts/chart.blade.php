<div class="p-8 rounded shadow chart-container bg-base" style="position: relative; height: 50vh; width: 100%;"
    x-data="charts" x-init="config.type = {{ Illuminate\Support\Js::from($type) }};
    config.data = {{ Illuminate\Support\Js::from($data) }};
    config.options = {
        ...{{ Illuminate\Support\Js::from($options) }},
        responsive: true,
        maintainAspectRatio: false
    };
    initChart(config);
    Livewire.on('chartInit', () => {
        const chartCanvas = document.getElementById('myChart').getContext('2d');
        if (window.myChart) window.myChart.destroy(); // Destruye el gráfico previo
        window.myChart = new Chart(chartCanvas, config);
    });">
    <canvas id="myChart" style="width: 100%; height: 100%;"></canvas>
</div>
