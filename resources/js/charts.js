document.addEventListener('alpine:init', () => {
    Alpine.data('charts', () => ({
        config: {
            type: null,
            data: null,
            options: null,
        },
        chartInstance: null, // Añadimos una variable para almacenar la instancia del gráfico

        initChart(config) {
            // Destruir la instancia existente del gráfico, si existe
            if (this.chartInstance) {
                this.chartInstance.destroy();
            }

            // Obtener el contexto del canvas
            const ctx = document.getElementById('myChart').getContext('2d');

            // Crear una nueva instancia del gráfico y almacenarla
            this.chartInstance = new Chart(ctx, config);
        },

        //TODO: esto no actualiza correctamente (da error max call stack size exceeded)
        updatingChart(chartUpdated) {
            // console.log(chartUpdated)
            // console.log(this.chartInstance.data.datasets);
            console.log(chartUpdated);

            chartUpdated[0].forEach((dataset, index) => {
                let label = dataset.label;
                let newData = dataset.data;
                this.chartInstance.data.datasets.find((chart, index) => {
                    if (chart.label === label) {
                        console.log(label, chart.data);
                        if (JSON.stringify(chart.data) !==
                            JSON.stringify(newData)) {
                            console.log("he cambiado");
                        }

                    }
                });


            });
            this.chartInstance.update();
        }
    }));
});
