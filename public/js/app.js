document.addEventListener("DOMContentLoaded", () => {
    const spinner = document.getElementById("loadingSpinner");

    document.querySelectorAll("form").forEach((form) => {
        form.addEventListener("submit", () => {
            spinner.classList.remove("d-none");
        });
    });

    document.addEventListener("click", function (e) {
        const paginationLink = e.target.closest(".pagination a.page-link");

        if (paginationLink) {
            e.preventDefault();
            const targetUrl = paginationLink.getAttribute("href");

            if (!targetUrl || targetUrl === "#") return;

            spinner.classList.remove("d-none");

            fetch(targetUrl, {
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                },
            })
                .then((response) => response.text())
                .then((html) => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, "text/html");

                    const newTableContent =
                        doc.querySelector("#table-container");
                    const currentTableContainer =
                        document.querySelector("#table-container");

                    if (newTableContent && currentTableContainer) {
                        currentTableContainer.innerHTML =
                            newTableContent.innerHTML;
                    }

                    history.pushState(null, "", targetUrl);
                })
                .catch((error) => {
                    console.error("Pagination error:", error);
                })
                .finally(() => {
                    spinner.classList.add("d-none");
                });
        }
    });
});
d;
