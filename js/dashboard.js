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