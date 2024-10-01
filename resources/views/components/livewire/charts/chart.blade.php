<div class="chart-container" style="position: relative; height:40vh; width:80vw;">
    <canvas id="myChart"></canvas>
</div>

<script type="module">
    const config = {
        type: {{ Illuminate\Support\Js::from($type) }},
        data: {{ Illuminate\Support\Js::from($data) }},
        options: {{ Illuminate\Support\Js::from($options) }},
    };
    new Chart(
        document.getElementById('myChart'),
        config // We'll add the configuration details later.
    );
</script>
