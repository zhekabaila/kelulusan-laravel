/** @type {import('tailwindcss').Config} */
export default {
    content: ["./resources/**/*.blade.php"],
    theme: {
        extend: {
            colors: {
                primary: "#007DFA",
                secondary: "#303468",
                mist: "#F5F5F7",
                heart: "#FF2C2C",
                "primary-100": "#EE6C4D",
                "primary-200": "#cc4f34",
                "primary-300": "#7f0000",
                "accent-100": "#F7D1B3",
                "accent-200": "#927156",
                "text-100": "#333333",
                "text-200": "#5c5c5c",
                "bg-100": "#f4fdfd",
                "bg-200": "#eaf3f3",
                "bg-300": "#c1caca",
            },
        },
    },
    plugins: [],
};
