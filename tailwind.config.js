import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Poppins", "Figtree", ...defaultTheme.fontFamily.sans],
                bebas: ["Bebas Neue", "sans-serif"],
            },
            colors: {
                primary: "#272e61",
                secondary: "#00796B",
                tertiary: "#00695C",
                quaternary: "#004D40",
                quinary: "#003324",
                senary: "#001A0E",
                septenary: "#000000",
            },
            backgroundImage: {
                "custom-gradient":
                    "linear-gradient(to right, #28366d, #3068b6)",
            },
        },
        container: {
            padding: {
                DEFAULT: "1rem",
                sm: "2rem",
                md: "3rem",
                lg: "4rem",
                xl: "5rem",
                "2xl": "6rem",
            },
        },
    },

    plugins: [forms],
};
