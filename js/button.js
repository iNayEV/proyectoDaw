document.getElementById("button-up").addEventListener("click", scrollUp);
        
function scrollUp(){
    var currentScroll = document.documentElement.scrollTop;
    
    if (currentScroll > 0){
        window.scrollTo({top: 0, behavior: 'smooth'});
    }
}

buttonUp = document.getElementById("button-up");

window.onscroll = function(){
    
    var scroll = document.documentElement.scrollTop;
    
    if (scroll > 500){
        buttonUp.classList.add("button-scale");
    }else if(scroll < 500){
        buttonUp.classList.remove("button-scale");
    }
    
}