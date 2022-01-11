function htmlToElement(html) {
    var template = document.createElement('template');
    html = html.trim(); // Never return a text node of whitespace as the result
    template.innerHTML = html;
    return template.content.firstChild;
}

console.log("Running");
let style;
let visible = true;

function toggleInfo(sender) {
    let elm = sender;
    if (sender.classList.contains('card')) {
        elm = sender.children[1];
    }
    elm.classList.remove("hide");
    console.log(sender.className)
    setTimeout(() => {
        elm.classList.add("hide");
    }, 2000);
}