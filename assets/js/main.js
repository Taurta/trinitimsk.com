function smoothScrollToElement(e, t = 0, o = "smooth") {
    const n = document.querySelector(e);
    if (!n) return;
    const s = n.getBoundingClientRect().top + window.pageYOffset - t;
    window.scrollTo({ top: s, behavior: o });
}

function initForm(e) {
    e.querySelectorAll("input").forEach((e) => {
        e.addEventListener("input", () => {
            e.classList.remove("error");
        });
    }),
        e.addEventListener("submit", async (t) => {
            t.preventDefault();
            const o = new FormData(e);
            appendUtmToFormData(o);
            const n = [],
                s = e.querySelector('input[name="name"]');
            s && !s.value?.length && n.push(s);
            const i = e.querySelector(".phone-input-wrapper");
            if (
                (i &&
                    !isValidPhoneNumber(i) &&
                    n.push(i.querySelector("input")),
                n.length)
            )
                return (
                    showNotification("Укажите обязательные поля", "error"),
                    void n.forEach((e) => {
                        e.classList.add("error");
                    })
                );
            o.set("phone", getFullPhoneNumber(i)), e.classList.add("disabled");
            const c = await fetch("/v1/methods/createOrder", {
                    method: "POST",
                    body: o,
                }),
                r = await c.json();
            r.success
                ? (showNotification("Заявка успешно отправлена!", "success"),
                  //ym(101143679, "reachGoal", e.getAttribute("data-action")),
                  e.classList.remove("disabled"),
                  e.reset(),
                  resetInputs(e),
                  closePopups())
                : showNotification(r.message, "error");
        });
}

function initForms() {
    const e = document.querySelectorAll("form.js-request");
    e?.length &&
        e.forEach((e) => {
            initForm(e);
        });
}

function initCustomInputs() {
    const form_inputs = document.querySelectorAll('.form-input');

    if (!form_inputs.length) return;

    form_inputs.forEach((form_input) => {
        const input = form_input.querySelector('input');

        input.addEventListener('focusin', () => {
            form_input.classList.add('focus');
        });

        input.addEventListener('focusout', () => {
            form_input.classList.remove('focus');
        });

        input.addEventListener('input', () => {
            if (input.value) {
                form_input.classList.add('not-empty');
            } else {
                form_input.classList.remove('not-empty');
            }
        });
    })
}

function resetInputs(form) {
    if (!form) return;

    const form_inputs = form.querySelectorAll('.form-input');

    if (!form_inputs.length) return;

    form_inputs.forEach((form_input) => {
        form_input.classList.remove('focus');
        form_input.classList.remove('not-empty');
    });
}

function saveUtmParams() {
    const e = new URLSearchParams(window.location.search),
        t = {};
    [
        "utm_source",
        "utm_medium",
        "utm_campaign",
        "utm_term",
        "utm_content",
    ].forEach((o) => {
        e.has(o) && (t[o] = e.get(o));
    }),
        Object.keys(t).length > 0 &&
            localStorage.setItem("utm_data", JSON.stringify(t));
}

function appendUtmToFormData(e) {
    const t = localStorage.getItem("utm_data");
    if (t)
        try {
            const o = JSON.parse(t);
            Object.entries(o).forEach(([t, o]) => {
                e.set(t, o);
            });
        } catch (e) {}
}

function isValidPhoneNumber(e) {
    if (!e) return;
    const t = e.querySelector('input[name="phone"]'),
        o = e.querySelector(".selected-option"),
        n = t.value,
        s = o.dataset.mask,
        i = n.replace(/\D/g, ""),
        c = (s.match(/#/g) || []).length;
    return i.length === c;
}

function getFullPhoneNumber(e) {
    if (!e) return;
    const t = e.querySelector('input[name="phone"]');
    return `${
        e.querySelector(".selected-option").dataset.code
    }${t.value.replace(/\D/g, "")}`;
}

function showNotification(e, t = "success", o = 3e3) {
    const n = document.getElementById("notifications-container"),
        s = document.createElement("div");
    (s.className = `notification ${t}`),
        (s.textContent = e),
        n.appendChild(s),
        setTimeout(() => {
            (s.style.opacity = "0"),
                (s.style.transform = "translateY(-10px)"),
                setTimeout(() => n.removeChild(s), 300);
        }, o);
}

function initPopups() {
    const popups = document.querySelector(".popups");

    if (!popups) return;

    const bg = popups.querySelector(".popups-bg");

    if (bg) {
        bg.addEventListener("click", () => {
            closePopups();
        });
    }
}

function openPopup(id) {
    const popups = document.querySelector(".popups");

    if (!popups) return;

    closePopups();

    const popup = popups.querySelector("#" + id);
    if (popup) {
        popup.classList.add("open");
        popups.classList.add("open");
    }
}

function closePopups() {
    const popups = document.querySelector(".popups");
    if (!popups) return;

    const items = popups.querySelectorAll(".popup");

    if (items?.length) {
        items.forEach((popup) => {
            popup.classList.remove("open");
        });
    }

    popups.classList.remove("open");
}

document.addEventListener("DOMContentLoaded", () => {
    initForms(), initPopups(), saveUtmParams(), initCustomInputs();
});
