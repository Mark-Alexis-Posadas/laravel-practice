document.addEventListener("DOMContentLoaded", () => {
    const dropZone = document.getElementById("dropZone");
    const fileInput = document.getElementById("excelFile");
    const selected = document.getElementById("selectedFile");

    if (!dropZone) return;

    dropZone.addEventListener("click", () => {
        fileInput.click();
    });

    fileInput.addEventListener("change", () => {
        showFile(fileInput.files[0]);
    });

    dropZone.addEventListener("dragover", (e) => {
        e.preventDefault();

        dropZone.classList.add("border-success", "bg-light");
    });

    dropZone.addEventListener("dragleave", () => {
        dropZone.classList.remove("border-success", "bg-light");
    });

    dropZone.addEventListener("drop", (e) => {
        e.preventDefault();

        dropZone.classList.remove("border-success", "bg-light");

        fileInput.files = e.dataTransfer.files;

        showFile(fileInput.files[0]);
    });

    function showFile(file) {
        if (!file) return;

        selected.classList.remove("d-none");

        selected.innerHTML = `<strong>Selected:</strong> ${file.name}`;
    }
});
