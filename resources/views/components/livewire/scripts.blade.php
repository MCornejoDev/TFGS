<script>
    document.addEventListener('alpine:init', () => {

        window.dateTimePicker = {};

        Alpine.data('themeSwitcher', () => ({
            theme: null,

            init() {
                // Obtener el tema actual, si está almacenado en localStorage
                this.theme = this.getTheme();

                // Si hay un tema almacenado, aplicarlo
                if (this.theme) {
                    this.applyTheme(this.theme);
                } else {
                    // Si no hay tema almacenado, establecer el tema por defecto
                    this.theme = 'dark';
                    this.applyTheme(this.theme);
                    localStorage.setItem("myTheme", this.theme);
                }
            },

            getTheme() {
                // Obtener el tema desde localStorage, si existe
                return localStorage.getItem("myTheme");
            },

            applyTheme(theme) {
                // Aplicar el tema, podría ser añadiendo una clase al body o cambiando alguna variable CSS
                document.documentElement.setAttribute('data-theme', theme);
            },

            switchTheme() {
                // Alternar entre 'light' y 'dark'
                this.theme = this.theme === 'light' ? 'dark' : 'light';
                this.applyTheme(this.theme);
                localStorage.setItem("myTheme", this.theme);
            }
        }));

        Alpine.data('filterForm', () => ({
            loading: false,
            clearFilter(model) {
                this.$wire.set(model, null);
                this.$wire.dispatch('resetSelect', model);
            },
            clearFilters() {
                this.$wire.clearFilters();
                this.$wire.dispatch('resetAll');
            }
        }));

        Alpine.data('form', () => ({
            open: false,
            options: [],
            isMultiple: false,
            selectedMultiple: [],
            selected: null,
            model: null,
            isDisabled: false,
            oldValue: null,
            placeholder: null,
            optionImage: null,
            optionLabel: null,
            optionDescription: null,
            api: null,
            searchQuery: '',
            copy: null,
            init() {
                this.$wire.on('resetAll', () => {
                    this.reset(); // Reseteo completo
                });

                this.$wire.on('resetSelect', (id) => {
                    if (this.model === id) {
                        this.reset(); // Reseteo parcial solo para el select correspondiente
                    }
                });
            },
            goInit() {
                this.selected = this.$wire.get(this.model);
            },
            handleCopy() {
                // Ensure the copy of options is only created once
                if (!this.copy) {
                    this.copy = [...this.options]; // Create a shallow copy of the original options
                }
            },
            restoreCopy() {
                // Restore the original options from the copy
                if (this.copy) {
                    this.options = [...this.copy];
                }
            },
            fetchFilteredOptions(optionLabel) {
                if (this.api === '') {
                    // If no API, use local filtering
                    this.handleCopy(); // Ensure a copy is made before filtering

                    // Perform the filtering on the copy, not on the original
                    this.options = this.copy.filter(option =>
                        option[optionLabel].toLowerCase().includes(this.searchQuery
                            .toLowerCase())
                    );
                } else {
                    // If using API, fetch results from server
                    this.handleFetch();
                }
            },
            handleFetch() {
                fetch(this.api + '?search=' + this.searchQuery)
                    .then(response => response.json())
                    .then(data => {
                        this.options =
                            data; // Guardamos los resultados filtrados en la variable options
                    });
            },
            handleMultiSelect(option) {
                if (this.selectedMultiple.includes(option)) {
                    const index = this.selectedMultiple.indexOf(option);
                    this.selectedMultiple.splice(index, 1);
                } else {
                    this.selectedMultiple.push(option);
                }
            },
            getMultiOptions() {
                return this.selectedMultiple.map(e => {
                    return e.id
                });
            },
            handleSelect(option) {
                if (this.isMultiple) {
                    this.handleMultiSelect(option);
                } else {
                    this.selected = option;
                    this.open = false;
                }

                this.$wire.set(this.model, this.isMultiple ? this.getMultiOptions() : option.id);
                this.restoreCopy();
                this.searchQuery = '';
            },
            setMultiLabel() {
                if (this.selectedMultiple.length === 0) {
                    return this.placeholder;
                }
                return this.selectedMultiple.map(option => option['name']).join(', ');
            },
            checkIfHasImage() {
                return this.selected && this.selected.hasOwnProperty('image');
            },
            setImage() {
                if (this.checkIfHasImage()) {
                    return this.selected.image;
                }
            },
            getValueFromModel() {
                //Se trocea porque el modelo es un form.field, pero podría ser perfectamente un field directamente
                //Aunque esto podría no ser necesario si encontramos la manera de usar el entangle
                const value = this.model.split('.');
                return this.$wire.form[value[value.length - 1]];
            },
            checkIfDependsOn(dependsOn) {
                return dependsOn != '' && (this.oldValue === null || this.oldValue !== this.$wire
                    .form[dependsOn]);
            },
            setLabel(dependsOn, optionLabel, optionDescription) {

                if (this.checkIfDependsOn(dependsOn)) {
                    this.oldValue = this.$wire.form[dependsOn];
                    this.selected = null;
                    return this.placeholder;
                }

                if (this.getValueFromModel() === null) {
                    return this.placeholder;
                }

                if (this.checkIfHasDescription(optionDescription)) {
                    // Mostrar label con descripción
                    return `${this.selected[optionLabel]} - `;
                } else {
                    // Mostrar solo label
                    return this.selected === null ? this.placeholder : this.selected[optionLabel];
                }
            },
            checkIfHasDescription(optionDescription) {
                return this.selected && this.selected.hasOwnProperty(optionDescription);
            },
            setDescription(optionDescription) {
                if (this.checkIfHasDescription(optionDescription)) {
                    return this.selected[optionDescription];
                }
            },
            getTextDescription(id, optionDescription) {

                if (optionDescription !== '') {
                    return this.options.find(option => option.id === id)[optionDescription];
                }

                return '';
            },
            setDisabled(dependsOn) {
                this.isDisabled = dependsOn === '' ? false : true;
            },
            getDisabled(dependsOn) {
                if (dependsOn) {
                    return this.$wire.form[dependsOn] === null;
                }
            },
            reset() {
                this.open = false;
                if (this.isMultiple) {
                    this.selectedMultiple = [];
                } else {
                    this.selected = null;
                }
                this.searchQuery = '';
                this.restoreCopy();
                this.setDisabled(this
                    .dependsOn); // Si dependsOn cambia el estado de disabled, lo actualizamos aquí
            },
        }))

        Alpine.data('datetimePicker', () => ({
            model: null,
            placeholder: null,
            open: false,
            showCalendar: false,
            selectedDate: '',
            selectedTime: '',
            displayDate: '',
            currentMonth: new Date().getMonth(),
            currentYear: new Date().getFullYear(),
            monthNames: [],
            days: [],

            init() {
                // Escuchar el evento emitido por Livewire usando $wire.on
                this.$wire.on('resetDateTimePicker', () => {
                    this.reset();
                });
            },

            get showDateTime() {

                if (this.selectedDate === '' && this.selectedTime === '') {
                    return this.placeholder;
                }

                return this.combinedDateTime;
            },


            get combinedDateTime() {
                return this.selectedDate + ' ' + this.selectedTime;
            },

            get monthYear() {
                return `${this.monthNames[this.currentMonth]} ${this.currentYear}`;
            },

            toggleDropdown() {
                this.open = !this.open;
            },

            setDateTime() {
                this.open = false;
                this.$wire.call('setDateTime', this.model, this.combinedDateTime);
            },

            selectDate(day) {
                const date =
                    `${this.currentYear}-${String(this.currentMonth + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                this.selectedDate = date;
                this.displayDate = this.formatDate(date);
                this.showCalendar = false;
                this
                    .generateDays(); // Regenerar días para asegurar que el día seleccionado esté marcado
            },

            formatDate(date) {
                const [year, month, day] = date.split('-');
                return `${day}-${month}-${year}`;
            },

            generateDays() {
                // Obtener el número de días en el mes actual
                const daysInMonth = new Date(this.currentYear, this.currentMonth + 1, 0).getDate();
                // Obtener el primer día del mes (0=Domingo, 1=Lunes, ..., 6=Sábado)
                const firstDayOfMonth = new Date(this.currentYear, this.currentMonth, 1).getDay();
                this.days = [];

                // Añadir los días en blanco antes del primer día del mes
                for (let i = 0; i < firstDayOfMonth; i++) {
                    this.days.push({
                        date: '',
                        isValid: false
                    });
                }

                // Añadir los días del mes actual
                for (let day = 1; day <= daysInMonth; day++) {
                    const date =
                        `${this.currentYear}-${String(this.currentMonth + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                    const isSelected = this.selectedDate === date;
                    this.days.push({
                        date: day,
                        isValid: true,
                        isSelected
                    });
                }
            },

            prevMonth() {
                if (this.currentMonth === 0) {
                    this.currentMonth = 11;
                    this.currentYear--;
                } else {
                    this.currentMonth--;
                }
                this.generateDays(); // Regenerar los días después de cambiar el mes
            },

            nextMonth() {
                if (this.currentMonth === 11) {
                    this.currentMonth = 0;
                    this.currentYear++;
                } else {
                    this.currentMonth++;
                }
                this.generateDays(); // Regenerar los días después de cambiar el mes
            },

            reset() {
                day = this.days.find(day => day.isSelected);
                if (day) {
                    day.isSelected = false;
                }
                this.selectedDate = '';
                this.selectedTime = '';
            }
        }));

        Alpine.data('diceRoller', () => ({
            currentFace: 1,
            transformStyle: 'rotateX(0deg) rotateY(0deg)',

            rollDice() {
                const faces = [1, 2, 3, 4, 5, 6];
                const finalFace = faces[Math.floor(Math.random() * faces.length)];
                this.currentFace = finalFace;

                // Genera una rotación aleatoria para el efecto de tirada
                const rotationX = Math.floor(Math.random() * 360);
                const rotationY = Math.floor(Math.random() * 360);

                // Aplica la transformación inicial para simular el lanzamiento
                this.transformStyle = `rotateX(${rotationX}deg) rotateY(${rotationY}deg)`;

                // Calcula la transformación final que muestra la cara correcta
                setTimeout(() => {
                    this.transformStyle = this.getFinalTransform(finalFace);
                }, 1000); // 1000ms coincide con la duración de la animación
            },

            getFinalTransform(face) {
                // Define las rotaciones finales para cada cara del dado
                const transforms = {
                    1: 'rotateX(0deg) rotateY(0deg)',
                    2: 'rotateX(0deg) rotateY(90deg)',
                    3: 'rotateX(0deg) rotateY(180deg)',
                    4: 'rotateX(0deg) rotateY(270deg)',
                    5: 'rotateX(90deg) rotateY(0deg)',
                    6: 'rotateX(-90deg) rotateY(0deg)'
                };
                console.log(face);
                return transforms[face];
            }
        }));

        Alpine.data('diceRoller2', () => ({
            isPlaying: false,
            x: 0,
            y: 0,
            z: 0,
            number: [],
            init() {
                console.log(this.dice);
            },
            check() {
                return this.$wire.get('die');
            },
            roll() {
                this.isPlaying = true;
                setTimeout(() => {
                    let dice = document.querySelector('.diceSelected');
                    let platform = this.$refs.platform;
                    let number = Math.floor(Math.random() * 6) + 1;
                    this.applyTransformations(number);
                    //this.
                    dice.style.transform = this.styles().dice.transform;
                    platform.style.transform = this.styles().platform.transform;

                    this.isPlaying = false;
                }, 1120);
            },
            styles() {
                return {
                    dice: {
                        transform: `rotateX(${this.x}deg) rotateY(${this.y}deg) rotateZ(${this.z}deg)`
                    },
                    platform: {
                        transform: 'translate3d(0, 0, 0px)'
                    },
                };
            },
            applyTransformations(number) {
                switch (number) {
                    case 1:
                        this.x = 0;
                        this.y = 20;
                        this.z = -20;
                        break;
                    case 2:
                        this.x = -100;
                        this.y = -150;
                        this.z = 10;
                        break;
                    case 3:
                        this.x = 0;
                        this.y = -100;
                        this.z = -10;
                        break;
                    case 4:
                        this.x = 0;
                        this.y = 100;
                        this.z = -10;
                        break;
                    case 5:
                        this.x = 80;
                        this.y = 120;
                        this.z = -10;
                        break;
                    case 6:
                        this.x = 0;
                        this.y = 200;
                        this.x = 10;
                        break;
                }
            }
        }));

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
</script>
