(function () {
    var bar = document.querySelector(".about-tabs-bar");
    var footer = document.querySelector(".site-footer");

    if (!bar || !bar.parentNode) {
        return;
    }

    var links = Array.prototype.slice.call(bar.querySelectorAll('a[href^="#"]'));
    var tabs = bar.querySelector(".about-tabs");
    var sections = links.map(function (link) {
        var target = document.querySelector(link.getAttribute("href"));
        return target ? { link: link, section: target } : null;
    }).filter(Boolean);

    if (!sections.length) {
        return;
    }

    var spacer = document.createElement("div");
    spacer.className = "about-tabs-spacer";
    spacer.setAttribute("aria-hidden", "true");
    bar.parentNode.insertBefore(spacer, bar);

    var pinPoint = 0;
    var stopPoint = Infinity;
    var mainPoint = 0;
    var barHeight = 0;
    var state = "normal";
    var activeId = "";

    function setState(nextState) {
        if (state === nextState) {
            return;
        }

        state = nextState;
        bar.classList.toggle("is-fixed", state === "fixed");
        bar.classList.toggle("is-stopped", state === "stopped");
    }

    function setActive(sectionId) {
        if (!sectionId || activeId === sectionId) {
            return;
        }

        activeId = sectionId;
        sections.forEach(function (item) {
            var isActive = item.section.id === activeId;
            item.link.classList.toggle("is-active", isActive);
            if (isActive) {
                item.link.setAttribute("aria-current", "true");
                if (tabs) {
                    tabs.scrollLeft = item.link.offsetLeft - ((tabs.clientWidth - item.link.offsetWidth) / 2);
                }
            } else {
                item.link.removeAttribute("aria-current");
            }
        });
    }

    function measure() {
        setState("normal");
        spacer.style.height = "0px";
        bar.style.top = "";

        barHeight = bar.offsetHeight;
        pinPoint = spacer.getBoundingClientRect().top + window.pageYOffset;
        updateStopPoint();

        update();
    }

    function updateStopPoint() {
        mainPoint = bar.closest(".page-main").getBoundingClientRect().top + window.pageYOffset;
        stopPoint = footer ? footer.getBoundingClientRect().top + window.pageYOffset - barHeight : Infinity;
    }

    function updateActive() {
        var marker = window.pageYOffset + barHeight + Math.min(window.innerHeight * 0.28, 220);
        var current = sections[0].section.id;

        sections.forEach(function (item) {
            if (item.section.offsetTop <= marker) {
                current = item.section.id;
            }
        });

        setActive(current);
    }

    function updatePin() {
        var scrollY = window.pageYOffset;
        updateStopPoint();

        if (scrollY < pinPoint) {
            spacer.style.height = "0px";
            bar.style.top = "";
            setState("normal");
            return;
        }

        spacer.style.height = barHeight + "px";

        if (scrollY >= stopPoint) {
            bar.style.top = stopPoint - mainPoint + "px";
            setState("stopped");
            return;
        }

        bar.style.top = "0px";
        setState("fixed");
    }

    function update() {
        updatePin();
        updateActive();
    }

    function scrollToSection(target) {
        var targetTop = target.getBoundingClientRect().top + window.pageYOffset;
        var offset = barHeight + 8;

        window.scrollTo({
            top: Math.max(targetTop - offset, 0),
            behavior: "smooth"
        });
    }

    links.forEach(function (link) {
        link.addEventListener("click", function (event) {
            var target = document.querySelector(link.getAttribute("href"));
            if (target) {
                event.preventDefault();
                setActive(target.id);
                scrollToSection(target);

                if (window.history && window.history.replaceState) {
                    window.history.replaceState(null, "", window.location.pathname + window.location.search);
                }
            }
        });
    });

    window.addEventListener("scroll", update, { passive: true });
    window.addEventListener("resize", measure);
    window.addEventListener("load", measure);

    if (document.fonts && document.fonts.ready) {
        document.fonts.ready.then(measure);
    }

    if ("ResizeObserver" in window) {
        var resizeObserver = new ResizeObserver(function () {
            updateStopPoint();
            update();
        });

        resizeObserver.observe(document.body);
    }

    measure();
})();
