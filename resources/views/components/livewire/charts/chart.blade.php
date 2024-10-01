<div>
    <canvas id="myChart"></canvas>
</div>

<script type="module">
    const config = {
        type: {{ Illuminate\Support\Js::from($type) }},
        data: {{{ Illuminate\Support\Js::from($data) }}}
    };
    new Chart(
        document.getElementById('myChart'),
        config // We'll add the configuration details later.
    );
</script>
