require("./tw-elements");
const toggleNav = document.getElementById("toggle");
const collapse = document.getElementById("collapse");

toggleNav.addEventListener("click", () => {
    collapse.classList.toggle("hidden");
});
