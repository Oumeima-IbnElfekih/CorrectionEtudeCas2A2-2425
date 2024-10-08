
// Correction partie 3 etude de cas Partie JS

document.addEventListener("DOMContentLoaded", function(){

var titleElement= document.getElementById("title");
var destinationelement= document.getElementById("destination");

titleElement.addEventListener("keyup", function(){
    var titleerrorElement= document.getElementById("title_error");
    var titleErrorValue=titleElement.value;
    if(titleErrorValue.length < 3) {
        titleerrorElement.innerHTML = "Le titre doit contenir au moins 3 caractères";
        titleerrorElement.style.color = "red";
    }
    else {
        titleerrorElement.innerHTML = "Correct";
        titleerrorElement.style.color = "green";
    }
})
destinationelement.addEventListener("keyup",function(){
    var destinationErrorElement= document.getElementById("destination_error");
    var destinationErrorValue=destinationelement.value;
    var pattern = /^[A-Za-z]{3,}$/
    if(!pattern.test(destinationErrorValue)){
        destinationErrorElement.innerHTML = "La destination doit contenir  uniquement des lettres et des espaces et au moins 3 caractères";
        destinationErrorElement.style.color = "red";
    }else
    { destinationErrorElement.innerHTML = "Correct";
        destinationErrorElement.style.color = "green";

    }
});

})