const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
        pagination: theme => ({
            // Customize the color only. (optional)
            color: theme('colors.teal.600'),
            linkFirst: 'mr-6 border rounded',
            linkSecond: 'rounded-l border-l',
            linkBeforeLast: 'rounded-r border-r',
            linkLast: 'ml-6 border rounded',
        
            // Customize styling using @apply. (optional)
            wrapper: 'flex justify-center list-reset',
        
            // Customize styling using CSS-in-JS. (optional)
            wrapper: {
                'display': 'flex',
                'justify-items': 'center',
                '@apply list-reset': {},
            },
        })
    },


    color: theme('colors.purple.600'),
    linkFirst: 'mr-6 border rounded',
    linkSecond: 'rounded-l border-l',
    linkBeforeLast: 'rounded-r border-r',
    linkLast: 'ml-6 border rounded',






    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography'), require('tailwindcss-plugins/pagination')],
};
