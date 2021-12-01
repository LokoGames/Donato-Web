console.log("Initializing...");

var images = document.getElementsByClassName("images");
var displayImg = document.getElementById("displayImg");

let currId = 0;

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

setInterval(changeImg, 5 * 1000);