(function () {
  const timeline = document.querySelector('.timeline');
  const progressBar = document.querySelector('.timeline-progress-bar');
  const items = Array.from(document.querySelectorAll('.timeline-item'));
  const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (!timeline || !progressBar || !items.length) return;

  const setProgress = () => {
    const rect = timeline.getBoundingClientRect();
    const viewportAnchor = window.innerHeight * 0.5;
    const scrollable = rect.height - window.innerHeight * 0.25;
    const raw = (viewportAnchor - rect.top) / Math.max(scrollable, 1);
    const progress = Math.min(1, Math.max(0, raw));
    progressBar.style.height = `${progress * 100}%`;
  };

  const setNearestActiveItem = () => {
    const target = window.innerHeight * 0.48;
    let nearest = items[0];
    let nearestDistance = Number.POSITIVE_INFINITY;

    items.forEach((item) => {
      const rect = item.getBoundingClientRect();
      const centre = rect.top + rect.height * 0.32;
      const distance = Math.abs(centre - target);

      if (distance < nearestDistance) {
        nearest = item;
        nearestDistance = distance;
      }
    });

    items.forEach((item) => {
      item.classList.toggle('is-active', item === nearest);
    });
  };

  const update = () => {
    setProgress();
    setNearestActiveItem();
  };

  if (reduceMotion) {
    progressBar.style.height = '100%';
    items.forEach((item) => item.classList.add('is-active'));
    return;
  }

  const itemObserver = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) update();
    });
  }, {
    rootMargin: '-30% 0px -30% 0px',
    threshold: [0, 0.25, 0.5, 0.75, 1]
  });

  items.forEach((item) => itemObserver.observe(item));
  update();
  window.addEventListener('scroll', update, { passive: true });
  window.addEventListener('resize', update);
})();
