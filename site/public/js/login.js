function montrerMotdePasse() {
    var input = document.getElementById("mdp");
    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
}

function setupListeners() {
    console.log("test")
    var checkBoxAfficher = document.getElementById("checkbox");
    checkBoxAfficher.addEventListener('click', montrerMotdePasse);
}

window.addEventListener("load", setupListeners);