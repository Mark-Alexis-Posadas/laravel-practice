document.addEventListener("DOMContentLoaded", () => {
    const spinner = document.getElementById("loadingSpinner");

    document.querySelectorAll("form").forEach((form) => {
        form.addEventListener("submit", () => {
            spinner.classList.remove("d-none");
        });
    });

    window.addEventListener("pageshow", () => {
        spinner.classList.add("d-none");
    });
});
