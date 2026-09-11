(function () {
    var section = document.querySelector(".intro-section");

    if (!section || !window.gsap) {
        return;
    }

    var prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)");

    if (prefersReducedMotion.matches) {
        return;
    }

    var gsap = window.gsap;
    var ScrollTrigger = window.ScrollTrigger;
    var leftShape = section.querySelector(".intro-shape-left");
    var rightShape = section.querySelector(".intro-shape-right");
    var sectionStartsInView = section.getBoundingClientRect().top <= window.innerHeight * 0.92;
    var textItems = [
        section.querySelector(".intro-kicker"),
        section.querySelector(".intro-section h2"),
        section.querySelector(".intro-cta")
    ].filter(Boolean);
    var columnItems = gsap.utils.toArray(".intro-columns article", section);

    if (ScrollTrigger) {
        gsap.registerPlugin(ScrollTrigger);
    }

    gsap.set(textItems.concat(columnItems), {
        autoAlpha: 0,
        y: 34
    });

    gsap.set(leftShape, {
        autoAlpha: 0,
        x: -130,
        y: 64,
        rotate: -36,
        scale: 0.9
    });

    gsap.set(rightShape, {
        autoAlpha: 0,
        x: 130,
        y: 56,
        rotate: -22,
        scale: 0.92
    });

    var introTimeline = gsap.timeline({
        defaults: {
            ease: "power3.out"
        },
        scrollTrigger: ScrollTrigger && !sectionStartsInView ? {
            trigger: section,
            start: "top 92%",
            toggleActions: "play none none none"
        } : null
    });

    introTimeline
        .to([leftShape, rightShape], {
            autoAlpha: 1,
            x: 0,
            y: 0,
            scale: 1,
            duration: 1,
            stagger: 0.08
        })
        .to(leftShape, {
            rotate: -26,
            duration: 1
        }, "<")
        .to(rightShape, {
            rotate: -34,
            duration: 1
        }, "<")
        .to(textItems, {
            autoAlpha: 1,
            y: 0,
            duration: 0.72,
            stagger: 0.12
        }, "-=0.74")
        .to(columnItems, {
            autoAlpha: 1,
            y: 0,
            duration: 0.62,
            stagger: 0.1
        }, "-=0.36");
}());
