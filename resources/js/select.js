document.addEventListener('alpine:init', () => {
    Alpine.data('select', () => ({
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
});
