import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './node_modules/flowbite/**/*.js',
    ],

    theme: {
        screens: {
            'xs': '450px',
            'sm': '640px',
            'md': '768px',
            'tablet': '960px',
            'lg': '1024px',
            'xl': '1280px',
            '2xl': '1536px',
            '3xl': '1920px',
        },
        extend: {
            fontFamily: {
                robotoregular: ["RobotoRegular", , ...defaultTheme.fontFamily.sans],
                robotothin: ["RobotoThin"],
                robotobold: ["RobotoBold"],
                santaregular: ["SantaRegular"],
            },
            colors: {
                'instagram-blue': '#0095F6',
            }
        },
    },

    plugins: [
        forms, 
        typography,
        require('flowbite/plugin'),
    ],
};
