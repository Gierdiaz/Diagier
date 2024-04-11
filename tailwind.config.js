/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                eczar: ["Eczar", "serif"],
                inter: ["Inter", "sans-serif"],
            },
            borderWidth: {
                18: "18px",
            },
            letterSpacing: {
                "custom-lg": "0.5rem",
            },
            screens: {
                "custom-xl": "1200px",
            },
            colors: {
                main: {
                    400: "#4EA2A5",
                },
            },
        },
    },
    plugins: [],
};
