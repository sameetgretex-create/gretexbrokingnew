(function () {
    var tocLinks = Array.prototype.slice.call(document.querySelectorAll(".policy-toc a[href^='#']"));

    if (!tocLinks.length) {
        return;
    }

    var sections = tocLinks
        .map(function (link) {
            var id = link.getAttribute("href").slice(1);
            var section = document.getElementById(id);

            return section ? { link: link, section: section } : null;
        })
        .filter(Boolean);

    if (!sections.length) {
        return;
    }

    var setActive = function (activeSection) {
        sections.forEach(function (item) {
            if (item.section === activeSection) {
                item.link.setAttribute("aria-current", "true");
            } else {
                item.link.removeAttribute("aria-current");
            }
        });
    };

    var updateActiveSection = function () {
        var anchorLine = Math.max(120, window.innerHeight * 0.28);
        var activeSection = sections[0].section;

        sections.forEach(function (item) {
            if (item.section.getBoundingClientRect().top <= anchorLine) {
                activeSection = item.section;
            }
        });

        setActive(activeSection);
    };

    var ticking = false;

    var requestUpdate = function () {
        if (ticking) {
            return;
        }

        ticking = true;
        window.requestAnimationFrame(function () {
            updateActiveSection();
            ticking = false;
        });
    };

    updateActiveSection();
    window.addEventListener("scroll", requestUpdate, { passive: true });
    window.addEventListener("resize", requestUpdate);
})();
