/** @type {import('tailwindcss').Config} */
const colors = require('tailwindcss/colors');

module.exports = {
    darkMode: 'class', // Enable dark mode with 'class' strategy
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./node_modules/flowbite/**/*.js",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',

    ],
    theme: {
        fontFamily: {
            sans: ['Inter', 'sans-serif'],
        },
        extend: {},
    },
    plugins: [
        require('flowbite/plugin')({
            charts: true,
            forms: true,
            tooltips: true,
        }),
    ],
}
