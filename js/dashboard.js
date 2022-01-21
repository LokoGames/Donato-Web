let body = document.querySelector("body");
let icon = document.querySelector(".icon");

let sunClass = "icon bi bi-brightness-high-fill";
let moonClass = "icon bi bi-moon-fill";

let darkMode = false;

let colors = {
    "dark": {
        "background": "#222",
        "class": sunClass,
        "text": "#EEE"
    },
    "light": {
        "background": "#DDD",
        "class": moonClass,
        "text": "#222"
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



/**
 * 
 * @param {HTMLElement} sender 
 */
function run(sender) {
    console.log(sender);
    let action = (sender.attributes["data"].value);
    console.log(action);
    switch (action) {
        case "logoff":
            fetch("./logout.php");
            self.location = "../pages/login.html";
            break;

        default:
            break;
    }
}