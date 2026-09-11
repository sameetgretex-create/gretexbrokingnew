(function () {
    var categoryLinks = Array.prototype.slice.call(document.querySelectorAll(".faq-categories a[href^='#']"));
    var faqGroups = Array.prototype.slice.call(document.querySelectorAll(".faq-group"));
    var faqItems = document.querySelectorAll("[data-faq-item]");

    if (!faqItems.length) {
        return;
    }

    function setPanelHeight(panel, isOpen) {
        panel.style.maxHeight = isOpen ? panel.scrollHeight + "px" : "0px";
    }

    function closeItem(item) {
        var button = item.querySelector("[data-faq-trigger]");
        var panel = item.querySelector("[data-faq-panel]");

        button.setAttribute("aria-expanded", "false");
        panel.hidden = false;
        setPanelHeight(panel, false);
    }

    function openItem(item) {
        var button = item.querySelector("[data-faq-trigger]");
        var panel = item.querySelector("[data-faq-panel]");

        button.setAttribute("aria-expanded", "true");
        panel.hidden = false;
        setPanelHeight(panel, true);
    }

    function getGroupId(group) {
        return group.getAttribute("aria-labelledby");
    }

    function closeAllItems() {
        faqItems.forEach(function (item) {
            closeItem(item);
        });
    }

    function activateCategory(categoryId, shouldUpdateHash) {
        var activeId = categoryId;

        if (!activeId || !faqGroups.some(function (group) {
            return getGroupId(group) === activeId;
        })) {
            activeId = getGroupId(faqGroups[0]);
        }

        faqGroups.forEach(function (group) {
            group.hidden = getGroupId(group) !== activeId;
        });

        categoryLinks.forEach(function (link) {
            var isActive = link.getAttribute("href") === "#" + activeId;

            link.classList.toggle("is-active", isActive);

            if (isActive) {
                link.setAttribute("aria-current", "true");
            } else {
                link.removeAttribute("aria-current");
            }
        });

        closeAllItems();

        if (shouldUpdateHash && window.history && window.history.replaceState) {
            window.history.replaceState(null, "", "#" + activeId);
        }
    }

    faqItems.forEach(function (item, index) {
        var button = item.querySelector("[data-faq-trigger]");
        var panel = item.querySelector("[data-faq-panel]");

        if (!button || !panel) {
            return;
        }

        closeItem(item);

        button.addEventListener("click", function () {
            var isOpen = button.getAttribute("aria-expanded") === "true";

            faqItems.forEach(function (otherItem) {
                if (otherItem !== item) {
                    closeItem(otherItem);
                }
            });

            if (isOpen) {
                closeItem(item);
            } else {
                openItem(item);
            }
        });
    });

    window.addEventListener("resize", function () {
        faqItems.forEach(function (item) {
            var button = item.querySelector("[data-faq-trigger]");
            var panel = item.querySelector("[data-faq-panel]");

            if (button && panel && button.getAttribute("aria-expanded") === "true") {
                setPanelHeight(panel, true);
            }
        });
    });

    if (categoryLinks.length && faqGroups.length) {
        categoryLinks.forEach(function (link) {
            link.addEventListener("click", function (event) {
                event.preventDefault();
                activateCategory(link.getAttribute("href").slice(1), false);
            });
        });

        window.addEventListener("hashchange", function () {
            activateCategory(window.location.hash.slice(1), false);
        });

        activateCategory(window.location.hash.slice(1), false);
    }
})();
