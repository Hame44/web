let textNormal = true;

document.addEventListener('DOMContentLoaded', (event) => {
    document.getElementById('buttonn').addEventListener('click', myFunction);
});

function myFunction() {
    if (textNormal) {
        document.body.style.fontSize = "smaller";
        textNormal=false;
        document.getElementById("p").innerHTML = "larger";

    }
    else {
        document.body.style.fontSize = "larger";
        textNormal=true;
        document.getElementById("p").innerHTML = "smaller";
    }
}