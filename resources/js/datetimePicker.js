document.addEventListener('alpine:init', () => {
    window.dateTimePicker = {};

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
        day: null,

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
            this.selectedDate = '';
            this.selectedTime = '';
        }
    }));
});

