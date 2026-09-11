(function () {
    'use strict';

    function normalize(value) {
        return value.trim().toLowerCase();
    }

    function bindCalculatorSearch() {
        const form = document.querySelector('[data-calculator-search-form]');
        const input = document.querySelector('[data-calculator-search]');
        const clearButton = document.querySelector('[data-calculator-clear]');
        const cards = Array.from(document.querySelectorAll('[data-calculator-card]'));
        const categoryButtons = Array.from(document.querySelectorAll('[data-category-filter]'));
        const emptyState = document.querySelector('[data-calculator-empty]');
        const status = document.querySelector('[data-calculator-status]');
        const announcement = document.querySelector('[data-calculator-announcement]');
        const suggestionButtons = Array.from(document.querySelectorAll('[data-search-suggestion]'));
        let debounceId = 0;
        let activeRequest = null;
        let activeCategory = 'all';

        if (!form || !input || cards.length === 0) {
            return;
        }

        function getActiveCategoryLabel() {
            const activeButton = categoryButtons.find((button) => button.getAttribute('data-category-filter') === activeCategory);

            return activeButton ? activeButton.getAttribute('data-category-label') || activeButton.textContent.trim() : 'All Calculators';
        }

        function formatCount(count, singular, plural) {
            return `${count} ${count === 1 ? singular : plural}`;
        }

        function setStatus(visibleCount, query) {
            const categoryLabel = getActiveCategoryLabel();
            const message = query
                ? `${formatCount(visibleCount, 'result', 'results')} for "${input.value.trim()}"`
                : `${categoryLabel}, ${formatCount(visibleCount, 'calculator', 'calculators')}`;

            if (status) {
                if (query) {
                    status.innerHTML = `<strong>${formatCount(visibleCount, 'result', 'results')}</strong><span>for &ldquo;${escapeHtml(input.value.trim())}&rdquo;</span>`;
                } else {
                    status.innerHTML = `<strong>${escapeHtml(categoryLabel)}</strong><span>${formatCount(visibleCount, 'calculator', 'calculators')}</span>`;
                }
            }

            if (announcement) {
                announcement.textContent = message;
            }

            if (clearButton) {
                clearButton.hidden = query === '';
            }
        }

        function updateCategoryButtons(activeButton) {
            categoryButtons.forEach((item) => {
                const isActive = item === activeButton;
                item.classList.toggle('is-active', isActive);
                item.setAttribute('aria-pressed', isActive ? 'true' : 'false');
            });
        }

        function escapeHtml(value) {
            return value.replace(/[&<>"']/g, (character) => ({
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            })[character]);
        }

        function updateEmptyState(visibleCount) {
            if (emptyState) {
                emptyState.hidden = visibleCount !== 0;
            }
        }

        function applyLocalFilter(query) {
            let visibleCount = 0;

            cards.forEach((card) => {
                const searchText = card.getAttribute('data-search') || '';
                const cardCategory = card.getAttribute('data-category') || '';
                const categoryMatch = activeCategory === 'all' || cardCategory === activeCategory;
                const searchMatch = query === '' || searchText.includes(query);
                const isMatch = categoryMatch && searchMatch;

                card.hidden = !isMatch;

                if (isMatch) {
                    visibleCount += 1;
                }
            });

            updateEmptyState(visibleCount);
            setStatus(visibleCount, query);
        }

        function applyAjaxResults(results, query) {
            const visibleHrefs = new Set(results.map((result) => result.href));
            let visibleCount = 0;

            cards.forEach((card) => {
                const href = card.getAttribute('href') || '';
                const isMatch = visibleHrefs.has(href);

                card.hidden = !isMatch;

                if (isMatch) {
                    visibleCount += 1;
                }
            });

            updateEmptyState(visibleCount);
            setStatus(visibleCount, query);
        }

        function search() {
            const query = normalize(input.value);

            if (activeRequest) {
                activeRequest.abort();
            }

            activeRequest = new AbortController();

            fetch(`search.php?q=${encodeURIComponent(query)}&category=${encodeURIComponent(activeCategory)}`, {
                headers: {
                    Accept: 'application/json'
                },
                signal: activeRequest.signal
            })
                .then((response) => {
                    if (!response.ok) {
                        throw new Error('Search request failed');
                    }

                    return response.json();
                })
                .then((payload) => {
                    applyAjaxResults(Array.isArray(payload.results) ? payload.results : [], query);
                })
                .catch((error) => {
                    if (error.name !== 'AbortError') {
                        applyLocalFilter(query);
                    }
                });
        }

        form.addEventListener('submit', (event) => {
            event.preventDefault();
            search();
        });

        input.addEventListener('input', () => {
            window.clearTimeout(debounceId);
            debounceId = window.setTimeout(search, 140);
        });

        if (clearButton) {
            clearButton.addEventListener('click', () => {
                input.value = '';
                input.focus();
                search();
            });
        }

        suggestionButtons.forEach((button) => {
            button.addEventListener('click', () => {
                const allButton = categoryButtons.find((item) => item.getAttribute('data-category-filter') === 'all');

                activeCategory = 'all';
                updateCategoryButtons(allButton);
                input.value = button.getAttribute('data-search-suggestion') || button.textContent.trim();
                input.focus();
                search();
            });
        });

        categoryButtons.forEach((button) => {
            button.addEventListener('click', () => {
                activeCategory = button.getAttribute('data-category-filter') || 'all';
                updateCategoryButtons(button);

                search();
            });
        });

        search();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', bindCalculatorSearch);
    } else {
        bindCalculatorSearch();
    }
})();
