function htmlToElement(html) {
    var template = document.createElement('template');
    html = html.trim(); // Never return a text node of whitespace as the result
    template.innerHTML = html;
    return template.content.firstChild;
}

console.log("Running");
let style;

function showInfo(sender) {
    sender.children[1].style.visibility = "visible";
}

function hideInfo(sender) {
    setTimeout(() => {
        sender.style.visibility = "hidden";
    }, 2010);
}