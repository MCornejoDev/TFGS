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
            init() {
                this.loading = false;
            },
            handleSelect(event) {
                this.$wire.filters[event.target.dataset.filter] = event.target.value;
                this.$wire.setFilter(event.target.dataset.filter, event.target.value);
            },
            clearFilter(event) {
                const target = event.target;

                // Encuentra el select más cercano al botón de limpiar
                const filter = target.closest('select');
                console.log(target, filter);

                // // Limpia el filtro en Livewire
                // this.$wire.filters[filter.dataset.filter] = null;
                // this.$wire.setFilter(filter.dataset.filter, null);

                // // Restablece el select a su estado inicial
                // filter.value = "";
            },
            clearFilters() {
                this.loading = true;
                this.$wire.clearFilters();
                this.loading = false;
            }
        }));
        // Alpine.data('searchByForm', () => ({
        //     category: null,
        //     init() {
        //         this.loading = false;
        //         this.category = this.$wire.category ?? null;
        //     },
        //     searchByTerm() {
        //         this.loading = true;
        //         this.$wire.searchByTerm();
        //     },
        //     clearFilters() {
        //         this.$wire.clearFilters();
        //     },
        //     checkParams() {
        //         const {
        //             category,
        //             search,
        //             minPrice,
        //             maxPrice
        //         } = this.$wire;

        //         const isCategoryEmpty = category.trim().length === 0;
        //         const isSearchEmpty = search.trim().length === 0;
        //         const isMinPriceEmpty = minPrice == '';
        //         const isMaxPriceEmpty = maxPrice == '';

        //         return isCategoryEmpty && isSearchEmpty && isMinPriceEmpty && isMaxPriceEmpty;
        //     },
        //     selectCategory(event) {
        //         this.$wire.setCategory(event.target.value);
        //     }
        // }));
    });
</script>
