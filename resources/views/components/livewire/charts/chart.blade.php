<div class="chart-container" style="position: relative; height:40vh; width:80vw;" x-data="charts"
    x-init="config.type = {{ Illuminate\Support\Js::from($type) }};
    config.data = {{ Illuminate\Support\Js::from($data) }};
    config.options = {{ Illuminate\Support\Js::from($options) }};
    initChart(config);
    Livewire.on('chartInit', () => {
        console.log(config);
        initChart(config);
    });">
    <canvas id="myChart"></canvas>
</div>
