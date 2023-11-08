const mq = window.matchMedia("(orientation: portrait)");

function uncheck(){
    const checkboxes = document.querySelectorAll('input[id="input"]');
    checkboxes.forEach((checkbox) => {
        checkbox.checked = false;
    });
}

function reveal() {
    var reveals = document.querySelectorAll(".reveal");

    for (var i = 0; i < reveals.length; i++) {
        var windowHeight = window.innerHeight;
        var elementTop = reveals[0].getBoundingClientRect().top;
        if(mq.matches){
            var elementVisible = 100;
        } else {
            var elementVisible = 50;
        }
        

        if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add("active");
        } else {
            reveals[i].classList.remove("active");
            uncheck();
            closeAllSelect();
        }
    }
}

window.addEventListener("scroll", reveal);