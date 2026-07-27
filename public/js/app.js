document.addEventListener("DOMContentLoaded", () => {
    const spinner = document.getElementById("loadingSpinner");
    const filterForm = document.getElementById("filter-form");

    function fetchTableData(url) {
        if (spinner) spinner.classList.remove("d-none");

        fetch(url, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
            },
        })
            .then((response) => response.text())
            .then((html) => {
                const parser = new DOMParser();
                const doc = parser.parseFromString(html, "text/html");

                const newTableContent = doc.querySelector("#table-container");
                const currentTableContainer =
                    document.querySelector("#table-container");

                if (newTableContent && currentTableContainer) {
                    currentTableContainer.innerHTML = newTableContent.innerHTML;
                }

                history.pushState(null, "", url);
            })
            .catch((error) => console.error("Error fetching data:", error))
            .finally(() => {
                if (spinner) spinner.classList.add("d-none");
            });
    }

    function submitFilterForm() {
        if (!filterForm) return;

        const formData = new FormData(filterForm);
        const params = new URLSearchParams();

        for (const [key, value] of formData.entries()) {
            if (value.trim() !== "") {
                params.append(key, value.trim());
            }
        }

        params.set("page", "1");

        const baseUrl = window.location.pathname;
        const queryString = params.toString();
        const targetUrl = `${baseUrl}?${queryString}`;

        fetchTableData(targetUrl);
    }

    if (filterForm) {
        filterForm.addEventListener("submit", (e) => {
            e.preventDefault();
            submitFilterForm();
        });
    }

    document.addEventListener("click", (e) => {
        const paginationLink = e.target.closest(".pagination a.page-link");

        if (paginationLink) {
            e.preventDefault();
            const targetUrl = paginationLink.getAttribute("href");

            if (targetUrl && targetUrl !== "#") {
                fetchTableData(targetUrl);
            }
        }
    });

    document.querySelectorAll("form").forEach((form) => {
        if (form.id !== "filter-form") {
            form.addEventListener("submit", () => {
                if (spinner) spinner.classList.remove("d-none");
            });
        }
    });
});
