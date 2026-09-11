(function () {
    var counters = Array.prototype.slice.call(document.querySelectorAll("[data-hero-odometer]"));

    if (!counters.length) {
        return;
    }

    function makeStatic(value) {
        var span = document.createElement("span");
        span.className = "hero-odometer-static";
        span.textContent = value;
        return span;
    }

    function makeDigit(value, index) {
        var digit = document.createElement("span");
        var track = document.createElement("span");

        digit.className = "hero-odometer-digit";
        track.className = "hero-odometer-track";
        track.style.setProperty("--odometer-digit", value);
        track.style.setProperty("--odometer-delay", (index * 90) + "ms");

        for (var i = 0; i <= 9; i += 1) {
            var number = document.createElement("span");
            number.textContent = i;
            track.appendChild(number);
        }

        digit.appendChild(track);
        return digit;
    }

    function buildCounter(counter) {
        var prefix = counter.getAttribute("data-prefix") || "";
        var value = counter.getAttribute("data-value") || "0";
        var suffix = counter.getAttribute("data-suffix") || "";
        var chars = (prefix + value + suffix).split("");
        var digitIndex = 0;

        counter.setAttribute("data-final-text", prefix + value + suffix);
        counter.textContent = "";
        counter.setAttribute("aria-label", prefix + value + suffix);

        chars.forEach(function (char) {
            if (/^\d$/.test(char)) {
                counter.appendChild(makeDigit(Number(char), digitIndex));
                digitIndex += 1;
                return;
            }

            counter.appendChild(makeStatic(char));
        });
    }

    counters.forEach(buildCounter);

    function activate(counter) {
        counter.classList.add("is-active");
    }

    if (!("IntersectionObserver" in window)) {
        counters.forEach(activate);
        return;
    }

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
            if (!entry.isIntersecting) {
                return;
            }

            activate(entry.target);
            observer.unobserve(entry.target);
        });
    }, {
        threshold: 0.4
    });

    counters.forEach(function (counter) {
        observer.observe(counter);
    });
}());
