(function () {
    var swiper = document.querySelector("[data-services-swiper]");
    var track = swiper ? swiper.querySelector(".services-track") : null;
    var prev = document.querySelector("[data-services-prev]");
    var next = document.querySelector("[data-services-next]");
    var cards = track ? Array.prototype.slice.call(track.querySelectorAll(".service-card")) : [];
    var currentIndex = 0;
    var currentOffset = 0;
    var isDragging = false;
    var hasDragged = false;
    var startX = 0;
    var startOffset = 0;
    var dragOffset = 0;
    var activePointerId = null;

    if (!swiper || !track || !prev || !next || !cards.length) {
        return;
    }

    function getGap() {
        var styles = window.getComputedStyle(track);
        var gap = parseFloat(styles.columnGap || styles.gap || "0");

        return Number.isFinite(gap) ? gap : 0;
    }

    function getStep() {
        return cards[0].getBoundingClientRect().width + getGap();
    }

    function getVisibleWidth() {
        var rect = swiper.getBoundingClientRect();
        var viewportWidth = document.documentElement.clientWidth || window.innerWidth;
        var styles = window.getComputedStyle(swiper);
        var endGutter = parseFloat(styles.paddingRight || "0");

        return Math.max(0, viewportWidth - rect.left - (Number.isFinite(endGutter) ? endGutter : 0));
    }

    function getMaxOffset() {
        return Math.max(0, track.scrollWidth - getVisibleWidth());
    }

    function getSnapPoints() {
        var step = getStep();
        var maxOffset = getMaxOffset();
        var points = [0];
        var nextPoint = step;

        if (step <= 0 || maxOffset <= 0) {
            return points;
        }

        while (nextPoint < maxOffset) {
            points.push(nextPoint);
            nextPoint += step;
        }

        if (points[points.length - 1] !== maxOffset) {
            points.push(maxOffset);
        }

        return points;
    }

    function getMaxIndex() {
        return getSnapPoints().length - 1;
    }

    function updateSwiper() {
        var snapPoints = getSnapPoints();
        var maxIndex = snapPoints.length - 1;
        var offset;

        currentIndex = Math.max(0, Math.min(currentIndex, maxIndex));
        offset = snapPoints[currentIndex] || 0;
        currentOffset = offset;

        track.style.transform = "translate3d(" + (-offset) + "px, 0, 0)";
        prev.disabled = currentIndex === 0;
        next.disabled = currentIndex >= maxIndex;
    }

    function setTrackOffset(offset) {
        currentOffset = Math.max(0, Math.min(offset, getMaxOffset()));
        track.style.transform = "translate3d(" + (-currentOffset) + "px, 0, 0)";
    }

    function snapToNearest() {
        var snapPoints = getSnapPoints();
        var nearestIndex = 0;
        var nearestDistance = Infinity;

        snapPoints.forEach(function (point, index) {
            var distance = Math.abs(currentOffset - point);

            if (distance < nearestDistance) {
                nearestDistance = distance;
                nearestIndex = index;
            }
        });

        currentIndex = nearestIndex;
        track.style.transition = "";
        updateSwiper();
    }

    function startDrag(event) {
        if (event.button !== undefined && event.button !== 0) {
            return;
        }

        isDragging = true;
        hasDragged = false;
        startX = event.clientX;
        startOffset = currentOffset;
        dragOffset = currentOffset;
        activePointerId = event.pointerId;
        track.style.transition = "none";
        swiper.classList.add("is-dragging");

        if (swiper.setPointerCapture && activePointerId !== undefined) {
            swiper.setPointerCapture(activePointerId);
        }
    }

    function moveDrag(event) {
        var deltaX;

        if (!isDragging || (activePointerId !== null && event.pointerId !== activePointerId)) {
            return;
        }

        deltaX = event.clientX - startX;

        if (Math.abs(deltaX) > 6) {
            hasDragged = true;
        }

        dragOffset = startOffset - deltaX;
        setTrackOffset(dragOffset);
    }

    function endDrag(event) {
        if (!isDragging || (activePointerId !== null && event.pointerId !== activePointerId)) {
            return;
        }

        isDragging = false;
        activePointerId = null;
        swiper.classList.remove("is-dragging");
        snapToNearest();
    }

    prev.addEventListener("click", function () {
        currentIndex -= 1;
        updateSwiper();
    });

    next.addEventListener("click", function () {
        currentIndex += 1;
        updateSwiper();
    });

    swiper.addEventListener("pointerdown", startDrag);
    swiper.addEventListener("pointermove", moveDrag);
    swiper.addEventListener("pointerup", endDrag);
    swiper.addEventListener("pointercancel", endDrag);
    swiper.addEventListener("lostpointercapture", function () {
        if (!isDragging) {
            return;
        }

        isDragging = false;
        activePointerId = null;
        swiper.classList.remove("is-dragging");
        snapToNearest();
    });

    swiper.addEventListener("click", function (event) {
        if (!hasDragged) {
            return;
        }

        event.preventDefault();
        event.stopPropagation();
        hasDragged = false;
    }, true);

    window.addEventListener("resize", updateSwiper);
    updateSwiper();
}());
