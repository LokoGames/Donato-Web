console.log("Initializing...");

var images = document.getElementsByClassName("images");
var displayImg = document.getElementById("displayImg");

let currId = 0;
let darkMode = false;


let sunClass = "icon bi bi-brightness-high-fill";
let moonClass = "icon bi bi-moon-fill";

onload = function() {
    displayImg.src = images[currId].src;
}

function changeImg() {
    if (currId < images.length - 1) {
        currId++;
    } else {
        currId = 0;
    }
    displayImg.src = images[currId].src;

}

function setImage(sender, id) {
    currId = id;
    document.getElementById(`displayImg`).src = sender.src;
}

setInterval(changeImg, 5 * 1000);

let body = document.querySelector("body");
let icon = document.querySelector(".icon");

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