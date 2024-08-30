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
            handleSelect(option) {
                this.selected = option;
                this.open = false;
                this.$wire.set(this.model, option.id);
            },
        }))
    });
</script>
