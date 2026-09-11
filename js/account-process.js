(function () {
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  const compactViewport = window.matchMedia('(max-width: 991px)');

  const setMediaHeight = (media, height) => {
    media.style.height = `${height}px`;
    media.style.overflow = 'hidden';
  };

  const initCardOpeners = () => {
    const cards = Array.from(document.querySelectorAll('.colum_card_main'));
    const entries = cards.map((card) => {
      const media = card.querySelector('.timeline_card_anim');
      if (!media) return null;

      const openHeight = media.getBoundingClientRect().height;
      setMediaHeight(media, reduceMotion || compactViewport.matches ? openHeight : 0);

      return { card, media, openHeight, isOpen: reduceMotion || compactViewport.matches };
    }).filter(Boolean);

    if (!entries.length || reduceMotion) return;

    const openCard = (entry) => {
      if (entry.isOpen) return;
      entry.isOpen = true;
      entry.media.style.height = `${entry.openHeight}px`;
    };

    const closeCard = (entry) => {
      if (!entry.isOpen) return;
      entry.isOpen = false;
      entry.media.style.height = '0px';
    };

    entries.forEach((entry) => {
      entry.media.style.transition = 'height 850ms cubic-bezier(0.22, 1, 0.36, 1)';
    });

    const update = () => {
      if (compactViewport.matches) {
        entries.forEach(openCard);
        return;
      }

      const triggerY = window.innerHeight * 0.4;

      entries.forEach((entry) => {
        const rect = entry.card.getBoundingClientRect();
        if (rect.top <= triggerY) {
          openCard(entry);
        } else {
          closeCard(entry);
        }
      });
    };

    update();
    window.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', () => {
      entries.forEach((entry) => {
        const wasOpen = compactViewport.matches || entry.isOpen;
        entry.media.style.height = 'auto';
        entry.openHeight = entry.media.getBoundingClientRect().height;
        entry.media.style.height = wasOpen ? `${entry.openHeight}px` : '0px';
        entry.isOpen = wasOpen;
      });
      update();
    });

    compactViewport.addEventListener('change', update);
  };

  const initTimelineProgress = () => {
    const wrapper = document.querySelector('.timeline_wrapper');
    const progressMain = document.querySelector('.timeline_progress_main');
    const current = document.querySelector('.timeline_current');
    const topLine = document.querySelector('.tl_current_top');
    const bottomLine = document.querySelector('.tl_current_bottom');
    const cube = document.querySelector('.white_cube');
    if (!wrapper || !progressMain || !current || !topLine || !bottomLine || !cube) return;

    const update = () => {
      const currentHeight = current.offsetHeight;
      const cubeHeight = cube.offsetHeight;
      const maxCubeTravel = Math.max(0, progressMain.offsetHeight - cubeHeight);

      if (reduceMotion) {
        const lineHeight = currentHeight * 0.5;
        topLine.style.height = `${lineHeight}px`;
        bottomLine.style.height = '0px';
        current.style.transform = `translate(-50%, ${maxCubeTravel * 0.5 - lineHeight}px)`;
        return;
      }

      const rect = wrapper.getBoundingClientRect();
      const directTravel = Math.min(maxCubeTravel, Math.max(0, -rect.top));
      const progress = maxCubeTravel > 0 ? directTravel / maxCubeTravel : 0;
      const lineHeight = progress * currentHeight * 0.5;

      current.style.transform = `translate(-50%, ${directTravel - lineHeight}px)`;
      topLine.style.height = `${lineHeight}px`;
      bottomLine.style.height = '0px';
    };

    update();
    window.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', update);
  };

  const initHeading = () => {
    const heading = document.querySelector('.timeline_heading');
    if (!heading || reduceMotion) return;

    heading.style.transform = 'translateY(48px)';
    heading.style.opacity = '0';
    heading.style.transition = 'transform 900ms cubic-bezier(0.22, 1, 0.36, 1), opacity 900ms ease';

    const observer = new IntersectionObserver((items) => {
      items.forEach((item) => {
        if (!item.isIntersecting) return;
        heading.style.transform = 'translateY(0)';
        heading.style.opacity = '1';
        observer.disconnect();
      });
    }, { threshold: 0.2 });

    observer.observe(heading);
  };

  const init = () => {
    initHeading();
    initCardOpeners();
    initTimelineProgress();
  };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
