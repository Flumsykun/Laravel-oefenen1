/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                'primary': '#00ffb1',
                'secondary': '#ffed4a',
                'danger': '#e3342f',
            },
            fontFamily:{
                sans: ['Nunito', 'sans-serif'],
            },
            borderRadius: {
                '2rem': '2rem',
            }
        },
    },
    plugins: [],
}
