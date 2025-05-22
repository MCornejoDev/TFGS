document.addEventListener('alpine:init', () => {
    Alpine.data('modals', () => ({
        init() {
            this.$wire.on('loadModal', () => {
                $openModal('simpleModal')
            });
        },
    }));
});
