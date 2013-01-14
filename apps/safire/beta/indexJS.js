//######## get the required elements from the DOM



//###################END OF SECTION######################///////




//######## initialisation

var timedFunct1;
resizes(800,600);//remember that the body is obtained by the resizes function itself.

//###################END OF SECTION######################///////




//######## Callback functions

window.onresize = function(evt){
    resizes(800,600);
}

document.getElementById("userID").onfocus = function(evt){
    timedFunct1 = setInterval(function(){
        if(!sanitize(document.getElementById("userID"),/[^(\w)]|\(|\)|_/g,/^.{6,9}$/) || !sanitize(document.getElementById("passIn"),/\\|\/|'|"| /g,/^.{6,20}$/)){
            document.getElementById("logOn").disabled = true;
        }
        else{
            document.getElementById("logOn").disabled = false;
        }
    },5);
}
document.getElementById("passIn").onfocus = function(evt){
    timedFunct1 = setInterval(function(){
        if(!sanitize(document.getElementById("passIn"),/\\|\/|'|"| /g,/^.{6,20}$/) || !sanitize(document.getElementById("userID"),/[^(\w)]|\(|\)|_/g,/^.{6,9}$/)){
            document.getElementById("logOn").disabled = true;
        }
        else{
            document.getElementById("logOn").disabled = false;
        }
    },5);
}

document.getElementById("userID").onblur = function(evt){
    clearInterval(timedFunct1);
    this.value = this.value.toUpperCase();
}
document.getElementById("passIn").onblur = function(evt){
    clearInterval(timedFunct1);
}

//###################END OF SECTION######################///////



/*//////////////////////////
FUNCTIONS
////////////////////////////*/



//###################END OF SECTION######################///////