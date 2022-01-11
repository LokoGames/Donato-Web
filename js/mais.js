console.log("Initializing...");

var images = document.getElementsByClassName("images");
var displayImg = document.getElementById("displayImg");

let currId = 0;

onload = function() {
    displayImg.src = images[currId].src;
}

function changeImg() {
    clearTimeout();
    if (currId < images.length - 1) {
        currId++;
    } else {
        currId = 0;
    }
    displayImg.classList.toggle("change");
    setTimeout(() => {
        displayImg.classList.toggle("change");
        displayImg.src = images[currId].src;
    }, 2000);
}

function setImage(sender, id) {
    currId = id;
    document.getElementById(`displayImg`).src = sender.src;
}

setInterval(changeImg, 5 * 1000);