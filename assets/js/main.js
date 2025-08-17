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
                  closePopup())
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

function openPopup(e, t = !1) {
    const o = document.getElementById("popup-root");
    (o.innerHTML = ""), (o.style.display = "flex");
    const n = document.createElement("div");
    n.className = "popup-backdrop";
    const s = document.createElement("div");
    (s.className = "popup-modal"), t && s.classList.add("fullscreen");
    const i = document.createElement("div");
    (i.className = "popup-close"), (i.onclick = closePopup), n.appendChild(i);
    const c = e.cloneNode(!0);
    s.appendChild(c),
        n.appendChild(s),
        o.appendChild(n),
        requestAnimationFrame(() => {
            n.classList.add("visible"), s.classList.add("visible");
        }),
        n.addEventListener("click", (e) => {
            e.target === n && closePopup();
        });
}

function closePopup() {
    const e = document.getElementById("popup-root"),
        t = e.querySelector(".popup-backdrop"),
        o = e.querySelector(".popup-modal");
    t && o
        ? (t.classList.remove("visible"),
          o.classList.remove("visible"),
          setTimeout(() => {
              (e.style.display = "none"), (e.innerHTML = "");
          }, 300))
        : ((e.style.display = "none"), (e.innerHTML = ""));
}

document.addEventListener("DOMContentLoaded", () => {
    initForms(), saveUtmParams(), initCustomInputs();
});
