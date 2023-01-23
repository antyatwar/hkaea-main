/** @type {import('tailwindcss').Config} */
const colors = require("tailwindcss/colors");

module.exports = {
    content: ["./resources/**/*.blade.php", "./vendor/filament/**/*.blade.php"],
    darkMode: "class",
    theme: {
        extend: {
            colors: {
                danger: colors.rose,
                primary: colors.red,
                success: colors.green,
                warning: colors.yellow,
            },
            fontFamily: {
                sans: ["Ubuntu", "sans-serif"],
                serif: ["Merriweather", "serif"],
            },
        },
    },
    plugins: [
        require("@tailwindcss/forms"),
        require("@tailwindcss/typography"),
    ],
};
