console.log("Initializing...");

var images = document.getElementsByClassName("image");
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