var displayLog = false;
var displayReg = false;

const logForm = document.getElementById("logspace");
const regForm = document.getElementById("regspace");
const totbox = document.getElementById("tot");
function showlog(){
    if(!displayLog){
        logForm.classList.remove("hide");
        if(!displayReg){
            totbox.classList.toggle('hide');
        }
        displayLog = true;
    } else {
        logForm.classList.add("hide");
        totbox.classList.toggle('hide');
        displayLog = false;
    }
    regForm.classList.add("hide");
    displayReg = false;
}

function showreg(){
    regForm.classList.remove("hide");
    logForm.classList.add("hide");
    displayReg = true;
    displayLog = false;
}



var display_option_state = false;
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