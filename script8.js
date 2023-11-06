var display_log_state = false;
var display_reg_state = false;
var display_option_state = false;
const logForm = document.getElementById("logspace");
const regForm = document.getElementById("regspace");
const totbox = document.getElementById("tot");

if(display_reg_state || display_log_state){
    window.addEventListener('click', () => {
        logForm.style.display = "none";
        totbox.classList.toggle('select-hide');
        regForm.style.display = "none";
        display_log_state = false;
        display_reg_state = false; 
    });
}
function showlog(){
    if(display_log_state == false){
        if(display_reg_state == true){
            logForm.style.display = "flex";
            regForm.style.display = "none";
            display_reg_state = false;
            display_log_state = true;
        } else {
            logForm.style.display = "flex";
            totbox.classList.toggle('select-hide');
            regForm.style.display = "none";
            display_log_state = true;
            display_reg_state = false;
        }
        
    }
    else {
        logForm.style.display = "none";
        totbox.classList.toggle('select-hide');
        regForm.style.display = "none";
        display_log_state = false;
        display_reg_state = false;
    }
}

function showreg(){
    regForm.style.display = "flex";
    logForm.style.display = "none";
    display_reg_state = true;
    display_log_state = false;
}

function showoption(){
    const userOption = document.getElementById("user-option");
    if(display_option_state == false){
        userOption.style.display = "block";
        display_option_state = true;
    } else{
        userOption.style.display = "none";
        display_option_state = false;
    }
}
function uncheck(){
    const checkboxes = document.querySelectorAll('input[id="input"]');
    checkboxes.forEach((checkbox) => {
        checkbox.checked = false;
    });
}

const mq = window.matchMedia("(orientation: portrait)");
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
document.getElementById("crtBtn").addEventListener("click", function(){
    document.getElementById('containerEs').scrollIntoView();
    uncheck();
})

var customSelects = document.getElementsByClassName("custom-select");
var numCustomSelects = customSelects.length;

for (var i = 0; i < numCustomSelects; i++) {
    var selectElement = customSelects[i].getElementsByTagName("select")[0];
    var selectElementLength = selectElement.length;
    
    /* Crea un nuovo elemento DIV per rappresentare l'elemento selezionato: */
    var selectedOption = document.createElement("DIV");
    selectedOption.setAttribute("class", "select-selected border reveal");
    selectedOption.innerHTML = 'seleziona tempo';
    customSelects[i].appendChild(selectedOption);

    /* Crea un nuovo elemento DIV per contenere la lista delle opzioni: */
    var optionContainer = document.createElement("DIV");
    optionContainer.setAttribute("class", "select-items select-hide reveal");

    for (var j = 0; j < selectElementLength; j++) {
        /* Crea un nuovo elemento DIV per rappresentare un'opzione: */
        var optionElement = document.createElement("DIV");
        optionElement.innerHTML = selectElement.options[j].innerHTML;
        optionElement.setAttribute("name", selectElement.options[j].innerHTML);
        if(j == selectElementLength - 1){
            optionElement.setAttribute("class", 'border-bottom');
        }
        
        /* Aggiunge un gestore di eventi "click" all'opzione: */
        optionElement.addEventListener("click", function (event) {
            var select = this.parentNode.parentNode.getElementsByTagName("select")[0];
            var numOptions = select.length;

            for (var k = 0; k < numOptions; k++) {
                if (select.options[k].innerHTML == this.innerHTML) {
                    selectedOption.innerHTML = this.innerHTML;
                    break;
                }
            }
        });

        optionContainer.appendChild(optionElement);
    }
    customSelects[i].appendChild(optionContainer);

    /* Aggiunge un gestore di eventi "click" all'elemento selezionato: */
    selectedOption.addEventListener("click", function (event) {
        event.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
        this.classList.toggle('border-top');
        this.classList.toggle('border');
    });
}


function closeAllSelect(elmnt) {
    var arrNo = [];
    var optionsContainer = document.getElementsByClassName("select-items");
    var selectedElmnt = document.getElementsByClassName("select-selected");
    var optionsContainerlenght = optionsContainer.length;
    var selectedElmntlenght = selectedElmnt.length;
    for (var i = 0; i < selectedElmntlenght; i++) {
        if (elmnt == selectedElmnt[i]) {
            arrNo.push(i);
        } else {
            selectedElmnt[i].classList.remove("select-arrow-active");
            selectedElmnt[i].classList.remove("border-top");
            selectedElmnt[i].classList.add("border");
        }
    }
    for (var i = 0; i < optionsContainerlenght; i++) {
        if (arrNo.indexOf(i)) {
            optionsContainer[i].classList.add("select-hide");
        }
    }
}
document.addEventListener("click", closeAllSelect);

/*
document.getElementById('checkinput').addEventListener('change', () => {
    var elements = document.querySelectorAll('[name="45"]');
    var selectedElmnt = document.getElementsByClassName("select-selected");
    var selectedElmntlenght = selectedElmnt.length;
    for (var i = 0; i < selectedElmntlenght; i++){
        if(selectedElmnt[i].innerHTML <= 45){
            selectedElmnt[i].innerHTML = 'seleziona tempo';
        }
    }
    elements.forEach(function(elmnt) {
        elmnt.classList.toggle('select-hide');
    });
    elements = document.querySelectorAll('[name="30"]');
    elements.forEach(function(elmnt) {
        elmnt.classList.toggle('select-hide');
    });
})*/