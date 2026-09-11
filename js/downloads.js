(function () {
    var tabs = Array.prototype.slice.call(document.querySelectorAll("[data-download-tab]"));
    var list = document.querySelector("[data-download-list]");
    var count = document.querySelector("[data-download-count]");
    var empty = document.querySelector("[data-download-empty]");
    var search = document.querySelector("[data-download-search]");
    var originalListHtml = list ? list.innerHTML : "";
    var cards = [];
    var activeCategory = "account";
    var searchTimer = 0;
    var activeController = null;

    if (!tabs.length || !list || !count || !empty) {
        return;
    }

    var labels = {
        account: "account-opening forms",
        other: "other forms",
        customer: "information-for-customers documents"
    };

    var placeholders = {
        account: "Search account opening forms...",
        other: "Search other forms...",
        customer: "Search information for customers..."
    };

    function escapeHtml(value) {
        return String(value).replace(/[&<>"']/g, function (character) {
            return {
                "&": "&amp;",
                "<": "&lt;",
                ">": "&gt;",
                "\"": "&quot;",
                "'": "&#039;"
            }[character];
        });
    }

    function refreshCards() {
        cards = Array.prototype.slice.call(list.querySelectorAll("[data-download-card]"));
    }

    function setTabState(category) {
        tabs.forEach(function (tab) {
            var isActive = tab.getAttribute("data-download-tab") === category;

            tab.classList.toggle("is-active", isActive);
            tab.setAttribute("aria-pressed", isActive ? "true" : "false");
        });

        if (search && placeholders[category]) {
            search.placeholder = placeholders[category];
        }
    }

    function setActiveTab(category) {
        var visibleCount = 0;

        activeCategory = category;
        list.innerHTML = originalListHtml;
        refreshCards();
        setTabState(category);

        cards.forEach(function (card) {
            var isVisible = card.getAttribute("data-download-category") === category;

            card.hidden = !isVisible;
            if (isVisible) {
                visibleCount += 1;
            }
        });

        empty.hidden = visibleCount > 0;
        count.textContent = visibleCount
            ? "Showing " + visibleCount + " " + (labels[category] || "documents")
            : "No " + (labels[category] || "documents") + " available";
    }

    function renderSearchResults(results, query) {
        list.innerHTML = results.map(function (item) {
            var title = escapeHtml(item.title);
            var category = escapeHtml(item.category);
            var reference = escapeHtml(item.reference);
            var date = escapeHtml(item.date);
            var size = escapeHtml(item.size);
            var url = escapeHtml(item.url);

            return [
                '<article class="download-card" data-download-card>',
                '<div>',
                '<div class="download-kicker">',
                '<span>' + category + '</span>',
                '<span>' + reference + '</span>',
                '</div>',
                '<h2>' + title + '</h2>',
                '<p>Matched document from the downloads library.</p>',
                '<div class="download-meta">',
                '<span>' + date + '</span>',
                '<span>' + size + '</span>',
                '</div>',
                '</div>',
                '<div class="download-actions">',
                '<a class="download-view" href="' + url + '" target="_blank" rel="noopener noreferrer">View Online</a>',
                '<a class="download-file" href="' + url + '" download aria-label="Download ' + title + '">',
                '<svg viewBox="0 0 24 24" aria-hidden="true">',
                '<path d="M12 3v12"></path>',
                '<path d="m7 10 5 5 5-5"></path>',
                '<path d="M5 21h14"></path>',
                '</svg>',
                '</a>',
                '</div>',
                '</article>'
            ].join("");
        }).join("");

        empty.hidden = results.length > 0;
        count.textContent = results.length
            ? 'Showing ' + results.length + ' global result' + (results.length === 1 ? '' : 's') + ' for "' + query + '"'
            : 'No global document results for "' + query + '"';
    }

    function runSearch(query) {
        var endpoint = search ? search.getAttribute("data-download-search-endpoint") : "";
        var url;

        if (!endpoint) {
            return;
        }

        if (activeController) {
            activeController.abort();
        }

        activeController = new AbortController();
        url = endpoint + "?q=" + encodeURIComponent(query);
        count.textContent = 'Searching documents for "' + query + '"...';

        fetch(url, { signal: activeController.signal })
            .then(function (response) {
                if (!response.ok) {
                    throw new Error("Search failed");
                }

                return response.json();
            })
            .then(function (payload) {
                renderSearchResults(Array.isArray(payload.results) ? payload.results : [], query);
            })
            .catch(function (error) {
                if (error.name === "AbortError") {
                    return;
                }

                empty.hidden = false;
                list.innerHTML = "";
                count.textContent = "Document search is temporarily unavailable";
            });
    }

    tabs.forEach(function (tab) {
        tab.addEventListener("click", function () {
            if (search) {
                search.value = "";
            }

            setActiveTab(tab.getAttribute("data-download-tab"));
        });
    });

    if (search) {
        search.addEventListener("input", function () {
            var query = search.value.trim();

            window.clearTimeout(searchTimer);
            if (!query) {
                if (activeController) {
                    activeController.abort();
                }
                setActiveTab(activeCategory);
                return;
            }

            searchTimer = window.setTimeout(function () {
                runSearch(query);
            }, 220);
        });
    }

    refreshCards();
    setActiveTab(activeCategory);
}());
