<script>
    document.addEventListener('alpine:init', () => {
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
            filters: {},
            init() {
                this.loading = false;
                this.filters = this.$refs.filterForm.querySelectorAll('select,input');
            },
            handleSelect(event) {
                this.$wire.filters[event.target.dataset.filter] = event.target.value;
                this.$wire.setFilter(event.target.dataset.filter, event.target.value);
            },
            clearFilter(filter) {
                this.$wire.filters[filter] = null;
                this.$wire.setFilter(filter, null);
                this.$refs.filterForm.querySelector(`[data-filter="${filter}"]`).value = "";
            },
            clearFilters() {
                this.loading = true;
                this.$wire.clearFilters();
                this.loading = false;
                this.filters.forEach(filter => {
                    filter.value = "";
                });
            }
        }));

        Alpine.data('form', () => ({
            open: false,
            options: [],
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
            handleSelect(option) {
                this.selected = option;
                this.open = false;
                this.$wire.set(this.model, option.id);
                this.restoreCopy();
                this.searchQuery = '';
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

                if (this.selected === null) {
                    return this.placeholder;
                }

                if (this.checkIfDependsOn(dependsOn)) {
                    this.oldValue = this.$wire.form[dependsOn];
                    this.selected = null;
                    return this.placeholder;
                }

                if (this.getValueFromModel() === null) {
                    return this.placeholder;
                }

                return this.checkIfHasDescription(optionDescription) ? this.selected[optionLabel] +
                    ' - ' :
                    this.selected[optionLabel];
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
            }
        }))

        Alpine.data('datetimePicker', () => ({
            model: null,
            open: false,
            showCalendar: false,
            selectedDate: '',
            selectedTime: '',
            displayDate: '',
            currentMonth: new Date().getMonth(),
            currentYear: new Date().getFullYear(),
            monthNames: [],
            days: [],

            get showDateTime() {
                console.log(this);
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
        }));
    });
</script>
