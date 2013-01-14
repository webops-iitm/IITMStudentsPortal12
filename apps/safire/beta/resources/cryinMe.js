//######initialisation code##########///////////////

var leftBar = document.getElementById("leftBar");
var footer = document.getElementById("footer");

////////////////////////



/*//////////////////////////
FUNCTIONS
////////////////////////////*/

function getScreenSize() {
    var winW = 630, winH = 460;
    if (document.body && document.body.offsetWidth) {
        winW = document.body.offsetWidth;
        winH = document.body.offsetHeight;
    }
    if (document.compatMode=='CSS1Compat' &&
        document.documentElement &&
        document.documentElement.offsetWidth ) {
        winW = document.documentElement.offsetWidth;
        winH = document.documentElement.offsetHeight;
    }
    if (window.innerWidth && window.innerHeight) {
        winW = window.innerWidth;
        winH = window.innerHeight;
    }
    var dim = new Array();
    dim[0] = winW;
    dim[1] = winH;
    return dim;
}

function resizes(minWidth,minHeight) {
    var scrolled = 0;
    var dimen = getScreenSize();
    var winW = dimen[0];
    var winH = dimen[1];
    if(winW>=minWidth) {
        document.body.style.width=winW+"px";
        document.body.style.overflowX = "hidden";
    }
    if(winW<minWidth) {
        document.body.style.width=minWidth + "px";
        document.body.style.overflowX = "auto";
        scrolled = 17;
    }
    if(minHeight){
        if(winH>=minHeight) {
            footer.style.top = (winH - 60 - scrolled) + "px";
            document.body.style.height = (winH - scrolled - 5) + "px";
        }
        if(winH<minHeight) {
            footer.style.top = (minHeight - 60 - scrolled) + "px";
            document.body.style.height = (minHeight - scrolled - 5) + "px";
        }
    }
}

function createRequest() {
    try {
        request = new XMLHttpRequest();
    } catch (tryMS) {
        try {
            request = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (otherMS) {
            try {
                request = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (failed) {
                request = null;
            }
        }
    }
    return request;
}

function countChildDivs(parentID)
{
    return document.getElementById(parentID).getElementsByTagName("div").length;
}

function fireEvent(target, event){
    if(target.fireEvent){
        target.fireEvent("on" + event);
    }
    else if(target.dispatchEvent){
        var evtCre = document.createEvent("Event");
        evtCre.initEvent(event, true, false);
        target.dispatchEvent(evtCre);
    }
}

function getScrolledLen(){
    var scrolledAmt = new Array();
    var scrollLeft,scrollTop;
    scrollLeft = 0;
    scrollTop = 0;
    if(window.pageYOffset || window.pageXOffset){
        scrollLeft = window.pageXOffset;
        scrollTop = window.pageYOffset;
    }
    else if(document.documentElement.scrollLeft || document.documentElement.scrollTop){
        scrollLeft = document.documentElement.scrollLeft;
        scrollTop = document.documentElement.scrollTop;
    }
    scrolledAmt[0] = scrollLeft;
    scrolledAmt[1] = scrollTop;
    return scrolledAmt;
}

function sanitize(target,regExIllChar,regExLen){
    var popupLife = 2000;
    var timedFunction;
    var execTime;
    var lenOrtho,illCharOrtho;
    var illCharsText = "Only text and numbers and spaces and the following characters ~`!@#$%^&*()_-+=}]{[|\\:;'\'/?.>,<";
    illCharsText = illCharsText.replace(regExIllChar,"|");
    illCharsText = illCharsText.replace("spaces|and|","");
    illCharsText = illCharsText.replace(/\|/g," ");
    if(!regExIllChar.test("|")){
        illCharsText += " |";
    }
    if(!/[^(\w)( )]|\(|\)|_/g.test(illCharsText)){//if there are no symbols remove the unnec. text
        illCharsText = illCharsText.replace("and the following characters","");
    }
    illCharsText = illCharsText.replace("characters","characters:");
    var lenExtrema = regExLen.source.match(/\d+/g);
    
    if(!document.getElementById(target.id + "dropdownBox")){
        
        var dropdownBox = document.createElement("div");
        dropdownBox.id = target.id + "dropdownBox";
        dropdownBox.className = "dropdownBox";
        var dropdownBoxWidth = (target.offsetWidth - 2 - 10);
        if(dropdownBoxWidth < 110){
            dropdownBoxWidth = 110;
        }
        dropdownBox.style.width = dropdownBoxWidth + "px";
        target.parentNode.appendChild(dropdownBox);
        
        var alertBox1 = document.createElement("div");
        alertBox1.id = target.id + "AlertBox1";
        alertBox1.className = "alertBox";
        alertBox1.style.zIndex = "998";
        alertBox1.style.marginTop = "3px";
        target.parentNode.appendChild(alertBox1);
        
        var alertBox2 = document.createElement("div");
        alertBox2.id = target.id + "AlertBox2";
        alertBox2.className = "alertBox";
        alertBox2.style.position = "static";
        document.getElementById(target.id + "dropdownBox").appendChild(alertBox2);
    }
    
    if(target.value.search(regExLen) == -1){
        document.getElementById(target.id + "AlertBox1").innerHTML = "Min. " + lenExtrema[0] + " & Max. " + lenExtrema[1];
        document.getElementById(target.id + "AlertBox1").style.display = "block";
        lenOrtho = false;
    }
    else{
        document.getElementById(target.id + "AlertBox1").style.display = "none";
        lenOrtho = true;
    }
    
    if(target.value.search(regExIllChar) != -1){
        target.value = target.value.replace(regExIllChar,"");
        document.getElementById(target.id + "AlertBox2").innerHTML = illCharsText;
        document.getElementById(target.id + "AlertBox2").style.display = "block";
        document.getElementById(target.id + "dropdownBox").style.display = "block";
        var now1 = new Date();
        document.getElementById(target.id + "AlertBox2").closingTime = now1.getTime() + (popupLife - 200);
        timedFunction = setTimeout(function(){
            var now2 = new Date();
            if(Number(document.getElementById(target.id + "AlertBox2").closingTime) < now2.getTime()){
                document.getElementById(target.id + "AlertBox2").style.display = "none";
                document.getElementById(target.id + "dropdownBox").style.display = "none";
            }
        },popupLife);
    }
    
    return lenOrtho;
}

function isEmailID(string2check){
    var regex = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return regex.test(string2check);
}

function isSanitizedStr(string,regExIllChar,regExLen){
    if(string.search(regExLen) == -1 || string.search(regExIllChar) != -1){
        return false;
    }
    else{
        return true;
    }
}

function loadResources(arrayNames){
    var noImgs = arrayNames.length;
    var i,resourceBank,img;
    resourceBank = document.createElement("div");
    resourceBank.id = "resourceBank";
    resourceBank.style.display = "none";
    for(i=0;i<noImgs;i++){
        img = document.createElement("img");
        img.alt = "";
        img.src = "../resources/websiteImgs/" + arrayNames[i];
        resourceBank.appendChild(img);
    }
    document.body.appendChild(resourceBank);
}

function stopPropogation(eventObj){
    if(window.event){
        eventObj = window.event;
        eventObj.cancelBubble = true;
    }
    else{
        eventObj.stopPropagation();
    }
}

//###################END OF SECTION######################///////
