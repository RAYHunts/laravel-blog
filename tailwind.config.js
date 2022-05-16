const defaultTheme = require("tailwindcss/defaultTheme");

module.exports = {
    darkMode: "class",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
                monts: ["Montserrat", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
        // require("@tailwindcss/forms"),
        require("tw-elements/dist/plugin"),
        require("@tailwindcss/line-clamp"),
    ],
};
