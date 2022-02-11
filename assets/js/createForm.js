var addQuestion = document.querySelector("#addQuestion");
var formContainer = document.querySelector("#formContainer");

var questionNumber = 0;

var questionChoice = document.createElement("input");
questionChoice.type = "text";
questionChoice.placeholder = "Choice text";
questionChoice.required = true;

var questionText = document.createElement("input");
questionText.type = "text";
questionText.placeholder = "Question title";
questionText.className = "questionText"
questionText.required = true;

var deleteQuestion = document.createElement("button");
deleteQuestion.type = "button";
deleteQuestion.className = "deleteQuestion";
deleteQuestion.innerHTML = '<img src="./assets/images/form/delete.png"/>';

var addChoice = document.createElement("button");
addChoice.textContent = "Add choice";
addChoice.className = "addChoice"
addChoice.type = "button";

var choiceContainer = document.createElement("div");
choiceContainer.className = "choiceContainer";

var questionType = document.createElement("select");
var opt1 = document.createElement("option");
var opt2 = document.createElement("option");
var opt3 = document.createElement("option");

opt1.value = 1;
opt2.value = 2;
opt3.value = 3;

opt1.textContent = "Multiple choice";
opt2.textContent = "Checkboxes";
opt3.textContent = "Short answer";

questionType.appendChild(opt1);
questionType.appendChild(opt2);
questionType.appendChild(opt3);


var multipleChoice = document.createElement("div");
multipleChoice.className = "questionContainer";



if(addQuestion) {
    addQuestion.addEventListener("click", function() {
        var tempQuestionTitle = questionText.cloneNode(true);
        tempQuestionTitle.name = "question[" + questionNumber + "][questionText]";

        var tempQuestionType = questionType.cloneNode(true);
        tempQuestionType.name = "question[" + questionNumber + "][questionType]";

        multipleChoice.appendChild(tempQuestionTitle);
        multipleChoice.appendChild(choiceContainer);
        multipleChoice.appendChild(addChoice);
        multipleChoice.appendChild(tempQuestionType);
        multipleChoice.appendChild(deleteQuestion);
        
        formContainer.append(multipleChoice.cloneNode(true));
        multipleChoice.removeChild(tempQuestionTitle);
        multipleChoice.removeChild(tempQuestionType);

        questionNumber++;
    })    
}

document.addEventListener("click", function(e) {
    if(e.target && e.target.className == "addChoice") {
        var questionIndex = e.target.parentNode.querySelector(".questionText").name;
        var currentIndex = questionIndex.match(/\d/g);
        currentIndex = currentIndex.join("");

        var tempQuestionChoice = questionChoice.cloneNode(true);
        tempQuestionChoice.name = "question[" + currentIndex + "][questionChoice][]";

        

        e.target.parentNode.querySelector(".choiceContainer").appendChild(tempQuestionChoice.cloneNode(true));
        
        
        
    }
    
    if(e.target && e.target.parentNode.className == "deleteQuestion") {
        e.target.parentNode.parentNode.remove();
    }
})