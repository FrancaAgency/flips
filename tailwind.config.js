const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')

module.exports = {
    // mode: 'jit',
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/*/.blade.php',
        './storage/framework/views/*.php',
        './resources/views/*/.blade.php',
    ],

    darkMode: false,

    theme: {
        extend: {
            screens: {
                'xs': '475px',
                ...defaultTheme.screens,
            },
            maxHeight: {
                116: "29rem",/*464px*/
                125: "31.25rem",/*500px*/
                140: "35rem",/*560px*/
                150: "37.5rem",/*600px*/
                190: "47.5rem",/*760px*/
            },
            minHeight: {
                18: "4.5rem",/*72*/
                33: "8.125rem",/*132px*/
                40: "11.25rem",/*180px*/
                62: "15.5rem",/*248px*/
                96: "24rem",/*384px*/
                100: "26rem",/*464px*/
                116: "29rem",/*464px*/
                150: "37.5rem",/*600px*/
            },
            maxWidth: {
                116: "29rem",/*464px*/
                125: "31.25rem",/*500px*/
                140: "35rem",/*560px*/
                150: "37.5rem",/*600px*/
                190: "47.5rem",/*760px*/
            },
            minWidth: {
                18: "4.5rem",/*72*/
                33: "8.125rem",/*132px*/
                62: "15.5rem",/*248px*/
                96: "24rem",/*384px*/
                116: "29rem",/*464px*/
                150: "37.5rem",/*600px*/
            },
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            
        },
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            black: colors.black,
            white: colors.white,
            blueGray: colors.blueGray,
            gray: colors.coolGray,
            // gray: colors.gray,
            trueGray: colors.trueGray,
            warmGray: colors.warmGray,
            red: colors.red,
            orange: colors.orange,
            amber: colors.amber,
            yellow: colors.yellow,
            lime: colors.lime,
            green: colors.green,
            emerald: colors.emerald,
            teal: colors.teal,
            cyan: colors.cyan,
            sky: colors.sky,
            blue: colors.blue,
            indigo: colors.indigo,
            violet: colors.violet,
            purple: colors.purple,
            fuchsia: colors.fuchsia,
            pink: colors.pink,
            rose: colors.rose,
            'gray50': 'rgba(31, 41, 55, 0.5)',
            'green20': 'rgba(34, 197, 94, 0.2)',
            'gray80': 'rgba(31, 41, 55, 0.8)',
            'green60': 'rgba(34, 197, 94, 0.6)',
        },

    },

    variants: {
        opacity: ({ after }) => after(['disabled']),
        extend: {
            // opacity: ['disabled'],
            display: ["group-hover"],
            opacity: ["group-hover"],
            translate: ["group-hover"],
            transform: ["group-hover"],
            width: ["group-hover", "hover"],
            height: ["group-hover", "hover"],
            padding: ["group-hover", "hover"],
            animation: ["group-hover", "hover"],
            scale: ["group-hover", "hover"],
            scale: ["group-hover", "hover"],
            text: ["focus", "group-focus"],
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography')
    ],
};