const defaultTheme = require('tailwindcss/defaultTheme');

const colors = require('tailwindcss/colors');

module.exports = {
    variants: {
        opacity: ['responsive', 'hover']
    },
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: colors,
        },
    },

    plugins: [require('@tailwindcss/forms')],
};