var customSelects = document.getElementsByClassName("custom-select");
var numCustomSelects = customSelects.length;

for (var i = 0; i < numCustomSelects; i++) {
    var selectElement = customSelects[i].getElementsByTagName("select")[0];
    var selectElementLength = selectElement.length;
    
    /* Crea un nuovo elemento DIV per rappresentare l'elemento selezionato: */
    var selectedOption = document.createElement("DIV");
    var inputElement = document.createElement("input");
    inputElement.setAttribute("class", "hide");
    inputElement.setAttribute("name", "tempo");
    selectedOption.setAttribute("class", "select-selected border reveal");
    selectedOption.innerHTML = 'seleziona tempo';
    customSelects[i].appendChild(selectedOption);
    customSelects[i].appendChild(inputElement);

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
                    inputElement.setAttribute("value", this.innerHTML);
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
        this.nextSibling.nextSibling.classList.toggle("select-hide");
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