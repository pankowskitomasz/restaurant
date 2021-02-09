var dataContent=[];

$("input, textarea").on("paste",function(){
    return false;
});

function checkFormText(){
    var inputArray = $("input[type='text']");
    var rgx = new RegExp(/[^a-zA-Z]+$/i);  
    for(var i=0;i<inputArray.length;i++){
        if(inputArray[i].value.match(rgx)){
            return false;
        }
    }
    return true;
}

function checkFormTel(){
    var inputArray = $("input[type='tel']");
    var rgx = new RegExp(/[^0-9]+$/i);  
    for(var i=0;i<inputArray.length;i++){
        if(inputArray[i].value.match(rgx)){
            return false;
        }
    }
    return true;
}

function checkFormEmail(){
    var inputArray = $("input[type='email']");
    var rgx = new RegExp(/[^a-zA-Z0-9.@]+$/i);
    for(var i=0;i<inputArray.length;i++){
        if(inputArray[i].value.match(rgx)){
            return false;
        }
    }
    return true;
}

function checkFormTextarea(){
    var inputArray = $("input[type='textarea']");
    var rgx = new RegExp(/[^a-zA-Z0-9.,!?#\- ]+$/i);
    for(var i=0;i<inputArray.length;i++){
        if(inputArray[i].value.match(rgx)){
            return false;
        }
    }
    return true;
}

function checkForm(){
    if(checkFormText()===true
        && checkFormTel()===true
        && checkFormEmail()===true
        && checkFormTextarea()===true){
            return true;
        }
    return false;
}

function swapTarget(){
    $("form").eq(0).attr("action","message.php");
}

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
}

function acceptPrivacyPolicy(){
    setCookie("privacy_accepted","1",1);
    $("#privacyModal").modal('hide');
}

function gpdrDeclaration(){
    if(getCookie("privacy_accepted")!="1"){
        $("#privacyModal").modal();
    }
}

function processData(dataA){
    var hnd = document.getElementById("items-container");
    var output="";
    if(Array.isArray(dataA)){
        for(var i=0;i<dataA.length;i++){
            output += "<div class=\"card mb-3\"><div class=\"card-body\">";
            output += "<div class=\"mb-2 border-bottom\"><h5 class=\"w-100 font-weight-bold mb-0\">";
            output += dataA[i].title;
            output += "</h5><small class=\"w-100 text-muted\">";
            output += dataA[i].category;
            output += "</small></div><p>";
            output += dataA[i].description;
            output += "</p></div></div>";
        }
    }
    hnd.innerHTML = output;
}

function filterData(filterA,dataA){
    var res = [];
    if(Array.isArray(dataA) && filterA!=="All"){
        res = dataA.filter(function(item){return item.category==filterA});
    }
    else{
        res = dataA;
    }
    return res;
}

function updateList(){
    var fhnd = document.getElementsByName("filterList")[0];
    var res = filterData(fhnd.options[fhnd.selectedIndex].text,dataContent);
    processData(res);
}


function getUrlParam(){
    return window.location.search.split("=")[1];
}

function updateListPos(){
    var hnd = document.getElementsByName("filterList")[0];
    var param = getUrlParam();
    for(var i=0;i<hnd.options.length;i++){
        if(hnd.options[i].text.toLowerCase()==param.replace("-"," ")){
            hnd.selectedIndex = i;
            console.log(i);
            break;
        }
    }
}

function getCaseData(){
    var xmlhttp;
    if(window.XMLHttpRequest){
        xmlhttp = new XMLHttpRequest();
    }
    else{
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function(){
        if(this.readyState==4 && this.status==200){
            dataContent=JSON.parse(this.responseText);
            var fhnd = document.getElementsByName("filterList")[0];
            fhnd.addEventListener("change",updateList);
            updateListPos();
            updateList();
        }    
    }
    xmlhttp.open("GET","casedata.php",true);        
    xmlhttp.setRequestHeader("Content-Type", "text/plain");
    xmlhttp.send();
}

if(window.location.href.indexOf("case-studies")>=0){
    getCaseData();
}

if(window.location.href.indexOf("reservation")>0
|| window.location.href.indexOf("contact")>0){
    setTimeout(swapTarget,11000);
}

gpdrDeclaration();