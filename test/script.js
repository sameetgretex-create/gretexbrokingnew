(function () {
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const desktopQuery = window.matchMedia('(min-width: 992px)');

  const toArray = (value) => Array.from(value || []);

  const getYear = (href) => {
    if (!href) return '';
    const hash = href.includes('#') ? href.slice(href.lastIndexOf('#') + 1) : href;
    return hash.replace(/\D/g, '');
  };

  const markBrokenImages = () => {
    const replaceWithPlaceholder = (image) => {
      if (!image.isConnected || image.dataset.placeholderApplied === 'true') return;

      const placeholder = document.createElement('div');
      placeholder.className = `${image.className} timeline-card-placeholder`;
      placeholder.setAttribute('role', 'img');
      placeholder.setAttribute('aria-label', image.getAttribute('alt') || 'Timeline image placeholder');
      image.dataset.placeholderApplied = 'true';
      image.replaceWith(placeholder);
    };

    document.querySelectorAll('.timeline-card-img').forEach((image) => {
      image.addEventListener('error', () => {
        replaceWithPlaceholder(image);
      }, { once: true });

      if (!image.getAttribute('src') && image.dataset.src && window.location.protocol !== 'file:') {
        image.setAttribute('src', image.dataset.src);
        return;
      }

      if (!image.getAttribute('src')) {
        replaceWithPlaceholder(image);
        return;
      }

      if (image.complete && image.naturalWidth === 0) {
        replaceWithPlaceholder(image);
        return;
      }
    });
  };

  const setActiveYear = (year, scope) => {
    if (!year) return;

    const root = scope || document;
    root.querySelectorAll('.timeline-card-div').forEach((card) => {
      card.classList.toggle('is-active', card.dataset.id === year);
      card.classList.toggle('swiper-slide-active', card.dataset.id === year);
    });

    document.querySelectorAll('.timeline-milestone-year-li').forEach((item) => {
      const link = item.querySelector('.timeline-milestone-year-text');
      const isActive = item.dataset.year === year || getYear(link && link.getAttribute('href')) === year;
      item.classList.toggle('is-active', isActive);
      if (link) {
        if (isActive) link.setAttribute('aria-current', 'true');
        else link.removeAttribute('aria-current');
      }
    });

    const bullet = document.querySelector('.swiper-pagination-bullet');
    if (bullet) {
      bullet.textContent = year.slice(-2);
      bullet.dataset.year = year.slice(0, 2);
      bullet.dataset.scroll = year.slice(-2);
    }

    document.querySelectorAll('.year-prefix').forEach((prefix) => {
      prefix.classList.toggle('year-prefix-active', prefix.dataset.prefix === year.slice(0, 2));
    });
  };

  const initDesktopTimeline = () => {
    const cards = toArray(document.querySelectorAll('.timeline-desktop-view .history-card-parent .timeline-card-div'));
    const links = toArray(document.querySelectorAll('.timeline-desktop-view .timeline-milestone-year-text'));
    if (!cards.length) return;

    const findNearestYear = () => {
      if (!desktopQuery.matches) return;

      const anchor = window.innerHeight * 0.48;
      let nearestCard = cards[0];
      let nearestDistance = Number.POSITIVE_INFINITY;

      cards.forEach((card) => {
        const rect = card.getBoundingClientRect();
        const cardAnchor = rect.top + rect.height * 0.32;
        const distance = Math.abs(cardAnchor - anchor);

        if (distance < nearestDistance) {
          nearestCard = card;
          nearestDistance = distance;
        }
      });

      setActiveYear(nearestCard.dataset.id, document.querySelector('.timeline-desktop-view'));
    };

    links.forEach((link) => {
      link.addEventListener('click', (event) => {
        const year = getYear(link.getAttribute('href'));
        const target = cards.find((card) => card.dataset.id === year);
        if (!target) return;

        event.preventDefault();
        target.scrollIntoView({
          behavior: reduceMotion ? 'auto' : 'smooth',
          block: 'center'
        });
        setActiveYear(year, document.querySelector('.timeline-desktop-view'));
      });
    });

    findNearestYear();
    window.addEventListener('scroll', findNearestYear, { passive: true });
    window.addEventListener('resize', findNearestYear);
  };

  const initMobileTimeline = () => {
    const rail = document.querySelector('.timeline-swiper .swiper-wrapper');
    const cards = toArray(document.querySelectorAll('.timeline-swiper .timeline-card-div'));
    const drag = document.querySelector('.swiper-scrollbar-drag');
    const dots = toArray(document.querySelectorAll('.timeline-mobile-scrollbar .rounded-dots-scrollbar'));
    if (!rail || !cards.length) return;

    const clamp = (value, min, max) => Math.min(max, Math.max(min, value));

    const getNearestCard = () => {
      const railRect = rail.getBoundingClientRect();
      const anchor = railRect.left + railRect.width / 2;
      let nearestCard = cards[0];
      let nearestDistance = Number.POSITIVE_INFINITY;

      cards.forEach((card) => {
        const rect = card.getBoundingClientRect();
        const cardCenter = rect.left + rect.width / 2;
        const distance = Math.abs(cardCenter - anchor);

        if (distance < nearestDistance) {
          nearestCard = card;
          nearestDistance = distance;
        }
      });

      return nearestCard;
    };

    const update = () => {
      if (desktopQuery.matches) return;

      const nearest = getNearestCard();
      const index = cards.indexOf(nearest);
      const maxScroll = Math.max(rail.scrollWidth - rail.clientWidth, 1);
      const progress = clamp(rail.scrollLeft / maxScroll, 0, 1);
      const maxDrag = rail.clientWidth - (drag ? drag.offsetWidth : 0);

      setActiveYear(nearest.dataset.id, document.querySelector('.timeline-swiper'));

      if (drag) {
        drag.style.transform = `translateX(${progress * maxDrag}px)`;
      }

      dots.forEach((dot, dotIndex) => {
        const dotProgress = dots.length <= 1 ? 0 : dotIndex / (dots.length - 1);
        const glow = Math.max(0, 1 - Math.abs(dotProgress - progress) * 8) * 0.5;
        dot.style.opacity = dotIndex === index ? '1' : String(0.28 + glow);
      });
    };

    dots.forEach((dot, index) => {
      dot.addEventListener('click', () => {
        const card = cards[Math.round((index / Math.max(dots.length - 1, 1)) * (cards.length - 1))];
        if (!card) return;
        card.scrollIntoView({
          behavior: reduceMotion ? 'auto' : 'smooth',
          block: 'nearest',
          inline: 'center'
        });
      });
    });

    rail.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', update);
    update();
  };

  const init = () => {
    markBrokenImages();
    initDesktopTimeline();
    initMobileTimeline();

    const firstCard = document.querySelector('.timeline-card-div');
    if (firstCard) {
      setActiveYear(firstCard.dataset.id);
    }

    desktopQuery.addEventListener('change', () => {
      const activeCard = document.querySelector('.timeline-card-div.is-active') || firstCard;
      if (activeCard) setActiveYear(activeCard.dataset.id);
    });
  };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
