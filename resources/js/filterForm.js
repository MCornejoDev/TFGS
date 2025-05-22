document.addEventListener('alpine:init', () => {
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
});
