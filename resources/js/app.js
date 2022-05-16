require("./bootstrap");
import "tw-elements";
const toggleNav = document.getElementById("toggle");
const collapse = document.getElementById("collapse");
const toggleDark = document.querySelectorAll('[data-toggle="toggle-dark"]');
const expand = document.querySelectorAll("#expand");
const sidebar = document.getElementById("sidebar");

expand.forEach((x) => {
    x.addEventListener("click", () => {
        sidebar.classList.toggle("translate-x-0");
    });
});

if (localStorage.theme === "dark") {
    document.documentElement.classList.add("dark");
    toggleDark.forEach(function (item) {
        item.innerHTML = '<i class="fas fa-sun"></i>';
    });
} else {
    toggleDark.forEach(function (item) {
        item.innerHTML = '<i class="fas fa-moon"></i>';
    });
}
toggleDark.forEach(function (item) {
    item.addEventListener("click", function () {
        document.documentElement.classList.toggle("dark");
        item.innerHTML =
            localStorage.theme === "light"
                ? '<i class="fas fa-sun"></i>'
                : '<i class="fas fa-moon"></i>';
        localStorage.theme = localStorage.theme === "dark" ? "light" : "dark";
    });
});

toggleNav.addEventListener("click", () => {
    collapse.classList.toggle("hidden");
});

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();
