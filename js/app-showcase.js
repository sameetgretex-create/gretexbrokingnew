(function () {
    var showcase = document.querySelector("[data-app-showcase]");

    if (!showcase) {
        return;
    }

    var tabs = Array.prototype.slice.call(showcase.querySelectorAll("[data-app-tab]"));
    var panels = Array.prototype.slice.call(showcase.querySelectorAll("[data-app-panel]"));

    if (!tabs.length || !panels.length) {
        return;
    }

    function activateTab(tab, shouldFocus) {
        var panelId = tab.getAttribute("aria-controls");

        tabs.forEach(function (item) {
            var isActive = item === tab;
            item.classList.toggle("is-active", isActive);
            item.setAttribute("aria-selected", isActive ? "true" : "false");
            item.setAttribute("tabindex", isActive ? "0" : "-1");
        });

        panels.forEach(function (panel) {
            var isActive = panel.id === panelId;
            panel.classList.toggle("is-active", isActive);
            panel.hidden = !isActive;
        });

        if (shouldFocus) {
            tab.focus();
        }
    }

    tabs.forEach(function (tab, index) {
        tab.addEventListener("click", function () {
            activateTab(tab, false);
        });

        tab.addEventListener("keydown", function (event) {
            var nextIndex = index;

            if (event.key === "ArrowRight" || event.key === "ArrowDown") {
                nextIndex = (index + 1) % tabs.length;
            } else if (event.key === "ArrowLeft" || event.key === "ArrowUp") {
                nextIndex = (index - 1 + tabs.length) % tabs.length;
            } else if (event.key === "Home") {
                nextIndex = 0;
            } else if (event.key === "End") {
                nextIndex = tabs.length - 1;
            } else {
                return;
            }

            event.preventDefault();
            activateTab(tabs[nextIndex], true);
        });
    });
})();
