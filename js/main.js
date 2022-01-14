function htmlToElement(html) {
    var template = document.createElement('template');
    html = html.trim(); // Never return a text node of whitespace as the result
    template.innerHTML = html;
    return template.content.firstChild;
}

console.log("Running");
let style;
let darkMode = false;

let sunClass = "icon bi bi-brightness-high-fill";
let moonClass = "icon bi bi-moon-fill";


function toggleInfo(sender) {
    let elm = sender;
    if (sender.classList.contains('card')) {
        elm = sender.children[1];
    }
    elm.classList.remove("hide");
    setTimeout(() => {
        elm.classList.add("hide");
    }, 2000);
}

let body = document.querySelector("body");
let icon = document.querySelector(".icon");

let colors = {
    "dark": {
        "text": "#CCC",
        "background": "#222",
        "class": sunClass
    },
    "light": {
        "text": "#222",
        "background": "#DDD",
        "class": moonClass
    }
}

toggleDark();

function toggleDark() {
    darkMode = !darkMode;
    let color = {
        "text": colors[(darkMode) ? "dark" : "light"]["text"],
        "background": colors[(darkMode) ? "dark" : "light"]["background"],
        "class": colors[(darkMode) ? "dark" : "light"]["class"]
    }
    body.style.color = color["text"];
    body.style.backgroundColor = color["background"];
    icon.className = color["class"];
}