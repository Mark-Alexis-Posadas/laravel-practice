document.addEventListener("DOMContentLoaded", () => {
    const spinner = document.getElementById("loadingSpinner");

    // Show loading kapag nagsubmit ng form
    document.querySelectorAll("form").forEach((form) => {
        form.addEventListener("submit", () => {
            spinner.classList.remove("d-none");
        });
    });
});
