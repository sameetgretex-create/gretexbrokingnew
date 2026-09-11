(function () {
    const popup = document.querySelector('[data-disclaimer-popup]');
    const closeButton = document.querySelector('[data-disclaimer-close]');

    if (!popup || !closeButton) {
        return;
    }

    document.documentElement.classList.add('has-disclaimer-popup');

    function closePopup() {
        popup.classList.add('is-hidden');
        document.documentElement.classList.remove('has-disclaimer-popup');
    }

    closeButton.addEventListener('click', function () {
        closePopup();
    });

    document.addEventListener('keydown', function (event) {
        if (event.key === 'Escape') {
            closePopup();
        }
    });
})();
