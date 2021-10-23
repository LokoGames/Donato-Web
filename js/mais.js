console.log("Initializing...");

var images = document.getElementsByClassName("images");
var displayImg = document.getElementById("displayImg");

onload = function() {
    displayImg.src = images[0].src;
}