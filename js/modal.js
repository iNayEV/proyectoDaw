var modalLogin = document.getElementById("div-modal-login");

function closeModalLogIn() {
    modalLogin.style.display = "none";
}

$(document).on('click','.likes-noAcc',function(){
    modalLogin.style.display = "block";
});

$(document).on('click','.follow-noAcc',function(){
    modalLogin.style.display = "block";
});

window.onclick = function(event) {
    if (event.target == modal) {
        modalLogin.style.display = "none";
    }
}

var modal = document.getElementById("div-modal");

var btn = document.getElementById("modal");

function closeModal() {
    modal.style.display = "none";
}

btn.onclick = function() {
    modal.style.display = "block";
}

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}