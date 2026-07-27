document.addEventListener("DOMContentLoaded", () => {
    const spinner = document.getElementById("loadingSpinner");
    const filterForm = document.getElementById("filter-form");

    // 1. Reusable AJAX fetch function
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

                // Update URL bar para intact ang query state (search/gender/sort/page)
                history.pushState(null, "", url);
            })
            .catch((error) => console.error("Error fetching data:", error))
            .finally(() => {
                if (spinner) spinner.classList.add("d-none");
            });
    }

    // 2. Helper function para i-build ang URL mula sa Filter Form
    // 2. Helper function para i-build ang URL mula sa Filter Form
    function submitFilterForm() {
        if (!filterForm) return;

        const formData = new FormData(filterForm);
        const params = new URLSearchParams();

        // Isama lang ang mga inputs na may totoong value (search, gender, sort)
        for (const [key, value] of formData.entries()) {
            if (value.trim() !== "") {
                params.append(key, value.trim());
            }
        }

        // Tiyaking babalik sa PAGE 1 tuwing magse-search/sort/filter
        params.set("page", "1");

        // Gamitin ang current path
        const baseUrl = window.location.pathname;
        const queryString = params.toString();
        const targetUrl = `${baseUrl}?${queryString}`;

        fetchTableData(targetUrl);
    }

    // 3. Intercept Filter Form Submit (Mag-a-apply LANG kapag pinindot ang Search button)
    if (filterForm) {
        filterForm.addEventListener("submit", (e) => {
            e.preventDefault();
            submitFilterForm();
        });

        // Tinanggal na natin dito yung auto-submit listener ng <select> inputs!
    }

    // 4. Intercept Pagination Link Clicks
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

    // 5. Loading spinner para sa IBA PANG FORMS LAMANG (Create, Edit, Delete, Import)
    document.querySelectorAll("form").forEach((form) => {
        if (form.id !== "filter-form") {
            form.addEventListener("submit", () => {
                if (spinner) spinner.classList.remove("d-none");
            });
        }
    });
});
