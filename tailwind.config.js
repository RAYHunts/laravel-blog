module.exports = {
    // enable dark mode
    darkMode: "media",
    content: [
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./node_modules/tw-elements/dist/js/**/*.js",
    ],
    theme: "",
    plugins: [
        require("tw-elements/dist/plugin"),
        require("@tailwindcss/line-clamp"),
    ],
};
