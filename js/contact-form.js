(function () {
    var form = document.querySelector("[data-contact-form]");
    if (!form) {
        return;
    }

    var button = form.querySelector("button[type='submit']");
    var statusBox = form.querySelector("[data-form-status]");
    var errorBox = form.querySelector("[data-form-errors]");
    var pending = false;

    function clearErrors() {
        form.querySelectorAll("[data-field]").forEach(function (field) {
            field.removeAttribute("aria-invalid");
        });
        form.querySelectorAll("[data-field-error]").forEach(function (node) {
            node.textContent = "";
        });
        if (errorBox) {
            errorBox.hidden = true;
            errorBox.textContent = "";
        }
        if (statusBox) {
            statusBox.hidden = true;
            statusBox.textContent = "";
        }
    }

    function showError(message, errors) {
        if (errorBox) {
            errorBox.hidden = false;
            errorBox.textContent = message || "Please correct the highlighted fields.";
            errorBox.focus();
        }

        Object.keys(errors || {}).forEach(function (name) {
            var escaped = window.CSS && CSS.escape ? CSS.escape(name) : name.replace(/[^a-zA-Z0-9_-]/g, "");
            var field = form.querySelector("[data-field='" + escaped + "']");
            var error = form.querySelector("[data-field-error='" + escaped + "']");
            if (field) {
                field.setAttribute("aria-invalid", "true");
            }
            if (error) {
                error.textContent = errors[name];
            }
        });
    }

    function setPending(isPending) {
        pending = isPending;
        if (button) {
            button.disabled = isPending;
            button.dataset.originalHtml = button.dataset.originalHtml || button.innerHTML || "Send Message";
            button.innerHTML = isPending ? "Sending..." : button.dataset.originalHtml;
        }
    }

    form.addEventListener("submit", function (event) {
        event.preventDefault();
        if (pending) {
            return;
        }

        clearErrors();
        setPending(true);

        fetch(form.action, {
            method: "POST",
            body: new FormData(form),
            credentials: "same-origin",
            headers: {
                "X-Requested-With": "XMLHttpRequest"
            }
        })
            .then(function (response) {
                return response.json().catch(function () {
                    return { ok: false, message: "We could not submit the form right now. Please try again later." };
                }).then(function (payload) {
                    payload.httpStatus = response.status;
                    return payload;
                });
            })
            .then(function (payload) {
                if (!payload.ok) {
                    if (payload.httpStatus === 429) {
                        showError("Too many submissions. Please try again later.", {});
                    } else {
                        showError(payload.message, payload.errors || {});
                    }
                    return;
                }

                if (statusBox) {
                    statusBox.hidden = false;
                    statusBox.textContent = payload.message || "Thank you. Your message has been received.";
                }
                form.reset();
                if (window.grecaptcha) {
                    window.grecaptcha.reset();
                }
            })
            .catch(function () {
                showError("We could not submit the form right now. Please try again later.", {});
            })
            .finally(function () {
                setPending(false);
        });
    });
}());

(function () {
    var dialog = document.querySelector("[data-authorized-dialog]");
    var openButton = document.querySelector("[data-authorized-open]");
    var closeButton = document.querySelector("[data-authorized-close]");

    if (!dialog || !openButton || !closeButton) {
        return;
    }

    function openDialog() {
        if (typeof dialog.showModal === "function") {
            dialog.showModal();
            return;
        }
        dialog.setAttribute("open", "");
    }

    function closeDialog() {
        if (typeof dialog.close === "function") {
            dialog.close();
            return;
        }
        dialog.removeAttribute("open");
    }

    openButton.addEventListener("click", openDialog);
    closeButton.addEventListener("click", closeDialog);

    dialog.addEventListener("click", function (event) {
        if (event.target === dialog) {
            closeDialog();
        }
    });
}());

(function () {
    function normalizeRecaptchaAccessibility() {
        var response = document.getElementById("g-recaptcha-response");
        if (response) {
            response.setAttribute("aria-label", "reCAPTCHA response");
            response.setAttribute("title", "reCAPTCHA response");
        }

        document.querySelectorAll(".g-recaptcha iframe").forEach(function (frame) {
            if (!frame.getAttribute("title")) {
                frame.setAttribute("title", "reCAPTCHA verification");
            }
        });
    }

    normalizeRecaptchaAccessibility();
    window.setTimeout(normalizeRecaptchaAccessibility, 800);
    window.setTimeout(normalizeRecaptchaAccessibility, 1800);

    if (window.MutationObserver) {
        var observer = new MutationObserver(normalizeRecaptchaAccessibility);
        observer.observe(document.documentElement, {
            childList: true,
            subtree: true
        });
    }
}());
