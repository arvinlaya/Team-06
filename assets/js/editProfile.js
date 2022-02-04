var toggle = document.querySelectorAll(".toggleEdit");

if(toggle) {
    for(let i = 0; i < toggle.length; i++) {
        let element = toggle[i];
        let textInput = element.parentElement.parentElement.childNodes[2];
        if(i == 3) {
            textInput.childNodes[1].disabled = true;
            element.addEventListener("click", function() {
                if(textInput.childNodes[1].disabled) {
                    textInput.childNodes[1].disabled = false;
                    textInput.childNodes[1].style.border = "black solid 1px";
                    textInput.childNodes[3].disabled = false;
                    textInput.childNodes[3].style.border = "black solid 1px";
                    textInput.childNodes[5].disabled = false;
                    textInput.childNodes[5].style.border = "black solid 1px";
                }
                else {
                    textInput.childNodes[1].disabled = true;
                    textInput.childNodes[1].style.border = "none";
                    textInput.childNodes[3].disabled = true;
                    textInput.childNodes[3].style.border = "none";
                    textInput.childNodes[5].disabled = true;
                    textInput.childNodes[5].style.border = "none";
                }
            })
            
        }
        else {
            textInput.disabled = true;
            element.addEventListener("click", function() {
                if(textInput.disabled) {
                    textInput.disabled = false;
                    textInput.style.border = "black solid 1px";
                }
                else {
                    textInput.disabled = true;
                    textInput.style.border = "none";
                }
            })
        }
    }
}