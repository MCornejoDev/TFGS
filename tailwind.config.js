const defaultTheme = require('tailwindcss/defaultTheme')

/** @type {import('tailwindcss').Config} */
export default {
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'secondary-200': '#FFEDB5', // Un amarillo pálido y suave
                'secondary-400': '#FFC56B', // Un amarillo más cálido y vibrante
                'secondary-500': '#FFB347', // Un tono de amarillo/naranja más estándar
                'secondary-600': '#E89E3A', // Un amarillo/naranja más oscuro
                'secondary-700': '#D07C28', // Un naranja más profundo
                'secondary-800': '#B7651B', // Un tono naranja oscuro
                'secondary-900': '#9C4E12', // Un tono marrón/naranja muy oscuro
            },
        },
    },
    variants: {
        extend: {
            backgroundColor: ['active'],
        }
    },
    presets: [
        require("./vendor/wireui/wireui/tailwind.config.js")
    ],
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./vendor/wireui/wireui/src/*.php",
        "./vendor/wireui/wireui/ts/**/*.ts",
        "./vendor/wireui/wireui/src/WireUi/**/*.php",
        "./vendor/wireui/wireui/src/Components/**/*.php",
    ],
    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('daisyui'),
    ],
    daisyui: {
        themes: ["light", "dark", "cupcake", "garden"],
    },
}
