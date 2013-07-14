//######## get the required elements from the DOM

//###################END OF SECTION######################///////



//######## initialisation

document.getElementById("help").innerHTML = "Welcome to the Help Section!";
resizes(1075,0);//remember that the body is obtained by the resizes function itself.

//###################END OF SECTION######################///////




//######## Callback functions

window.onresize = function(evt){
    resizes(1075,0);
}



//###################END OF SECTION######################///////
