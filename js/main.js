function htmlToElement(html) {
    var template = document.createElement('template');
    html = html.trim(); // Never return a text node of whitespace as the result
    template.innerHTML = html;
    return template.content.firstChild;
}

console.log("Running");
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
    }, 1000);
}