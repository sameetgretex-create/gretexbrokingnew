(function () {
    if (!window.gsap || !window.ScrollTrigger) {
        return;
    }

    var prefersReducedMotion = window.matchMedia("(prefers-reduced-motion: reduce)");

    if (prefersReducedMotion.matches) {
        return;
    }

    var gsap = window.gsap;
    var ScrollTrigger = window.ScrollTrigger;

    gsap.registerPlugin(ScrollTrigger);

    function uniqueElements(items) {
        var seen = [];

        return items.filter(function (item) {
            if (!item || seen.indexOf(item) !== -1) {
                return false;
            }

            seen.push(item);
            return true;
        });
    }

    function getSectionParts(section) {
        var heading = section.querySelector("h1, h2");
        var introImageReveal = section.querySelector(".intro-image-reveal");
        var introImage = introImageReveal ? introImageReveal.querySelector("img") : null;
        var images = gsap.utils.toArray([
            ".end-cta-visual",
            ".news-image",
            ".calculator-card",
            ".service-card",
            ".showcase-phone",
            ".showcase-browser",
            ".why-us-image-wrap > img"
        ].join(","), section);
        var paragraphs = gsap.utils.toArray([
            ".intro-section-text p",
            ".services-heading > p:not(.services-eyebrow)",
            ".charges-copy",
            ".calculator-header > p",
            ".why-us-tooltip p",
            ".app-showcase-heading > p",
            ".news-header > p",
            ".news-excerpt",
            ".faq-intro > p",
            ".end-cta-content > p"
        ].join(","), section);

        return {
            heading: heading,
            introImageReveal: introImageReveal,
            introImage: introImage,
            images: uniqueElements(images),
            paragraphs: uniqueElements(paragraphs)
        };
    }

    function setupSectionReveal(section) {
        var parts = getSectionParts(section);
        var revealItems = uniqueElements(
            [parts.heading, parts.introImageReveal].concat(parts.images, parts.paragraphs)
        );

        if (!revealItems.length) {
            return;
        }

        gsap.set(revealItems, {
            autoAlpha: 0,
            y: 34
        });

        gsap.set(parts.images, {
            clipPath: "inset(14% 0% 0% 0%)",
            scale: 0.985
        });

        if (parts.introImageReveal) {
            gsap.set(parts.introImageReveal, {
                autoAlpha: 1,
                y: 0,
                clipPath: "inset(0% 0% 100% 0%)"
            });
        }

        if (parts.introImage) {
            gsap.set(parts.introImage, {
                scale: 1.18
            });
        }

        var timeline = gsap.timeline({
            defaults: {
                ease: "power3.out"
            },
            onComplete: function () {
                gsap.set(revealItems, {
                    clearProps: "transform"
                });
                gsap.set(parts.images, {
                    clearProps: "clipPath,transform"
                });
                if (parts.introImageReveal) {
                    gsap.set(parts.introImageReveal, {
                        clearProps: "clipPath,transform"
                    });
                }
                if (parts.introImage) {
                    gsap.set(parts.introImage, {
                        clearProps: "transform"
                    });
                }
            },
            scrollTrigger: {
                trigger: section,
                start: "top 82%",
                once: true
            }
        });

        if (parts.heading) {
            timeline.to(parts.heading, {
                autoAlpha: 1,
                y: 0,
                duration: 0.7
            }, 0);
        }

        if (parts.images.length) {
            timeline.to(parts.images, {
                autoAlpha: 1,
                y: 0,
                clipPath: "inset(0% 0% 0% 0%)",
                scale: 1,
                duration: 0.78,
                stagger: 0.08
            }, 0);
        }

        if (parts.introImageReveal) {
            timeline.to(parts.introImageReveal, {
                clipPath: "inset(0% 0% 0% 0%)",
                duration: 0.92
            }, 0);
        }

        if (parts.introImage) {
            timeline.to(parts.introImage, {
                scale: 1,
                duration: 1.35
            }, 0);
        }

        if (parts.paragraphs.length) {
            timeline.to(parts.paragraphs, {
                autoAlpha: 1,
                y: 0,
                duration: 0.58,
                stagger: 0.09
            }, 0);
        }
    }

    gsap.utils.toArray([
        ".reference-intro-section",
        ".services-section",
        ".charges-section",
        ".calculator-section",
        ".why-us-image-section",
        ".app-showcase-section",
        ".news-section",
        ".faq-section",
        ".end-cta"
    ].join(",")).forEach(setupSectionReveal);
}());
