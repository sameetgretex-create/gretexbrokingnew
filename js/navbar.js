(function () {
    var navbar = document.querySelector("[data-navbar]");
    var toggle = document.querySelector("[data-navbar-toggle]");
    var menu = document.querySelector("[data-navbar-menu]");

    if (!navbar || !toggle || !menu) {
        return;
    }

    var mobileQuery = window.matchMedia("(max-width: 860px)");

    function setOpen(isOpen) {
        navbar.classList.toggle("is-open", isOpen);
        toggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
    }

    toggle.addEventListener("click", function () {
        setOpen(!navbar.classList.contains("is-open"));
    });

    menu.addEventListener("click", function (event) {
        if (event.target.closest("a")) {
            setOpen(false);
        }
    });

    document.addEventListener("click", function (event) {
        if (mobileQuery.matches && navbar.classList.contains("is-open") && !navbar.contains(event.target)) {
            setOpen(false);
        }
    });

    document.addEventListener("keydown", function (event) {
        if (event.key === "Escape") {
            setOpen(false);
        }
    });

    function handleViewportChange(event) {
        if (!event.matches) {
            setOpen(false);
        }
    }

    if (typeof mobileQuery.addEventListener === "function") {
        mobileQuery.addEventListener("change", handleViewportChange);
    } else if (typeof mobileQuery.addListener === "function") {
        mobileQuery.addListener(handleViewportChange);
    }
})();
