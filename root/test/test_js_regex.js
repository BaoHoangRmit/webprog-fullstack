function onlyLetters(str) {
    return /^[a-zA-Z]+$/.test(str);
}

let nameVali = function(){
    let cusName = $("#name-address").val();
    cusName = cusName.split(" ").join("");
    if(cusName.length == 0 || typeof(cusName) == undefined){
        return "Name section is required"
    }
    if(onlyLetters(cusName)){
        return true;
    }else{
        return "Your name contains invalid characters";
    }
}

let phoneVali = function(){
    let cusPhone = $("#phone-address").val();
    if(cusPhone.length == 0 || typeof(cusPhone) == undefined){
        return "Phone section is required";
    }
    let cnt = 0;
    for(let ele in cusPhone){
        if($.isNumeric(ele)){
            cnt++;
        }
    }
    if(cnt > 11){
        return "Your phone is oversize";
    }
    let isphone = /^[+]*[(]{0,1}[0-9]{1,3}[)]{0,1}[-\s\./0-9]*$/g.test(cusPhone);
    if(isphone){
        return true;
    }else{
        return "Your phone contains invalid characters";
    }
}

let mailVali = function(){
    let cusMail = $("#email-address").val();
    if(cusMail.length == 0 || typeof(cusMail) == undefined){
        return "Mail section is required";
    }
    let ismail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(cusMail);
    if(ismail){
        return true;
    }else{
        return "Your email is invalid";
    }
}

let locationVali = function(){
    let cusLoc = $("#location-address").val();
    if(cusLoc.length == 0 || typeof(cusLoc) == undefined){
        return "Location section is required";
    }
    cusLoc = cusLoc.replace(/\s*(\d+\/\d+|\.\d+)\s/g, '');
    cusLoc = cusLoc.split(",").join("");
    cusLoc = cusLoc.split(" ").join("");
    let isloc = /^[a-z0-9]+$/gi.test(cusLoc);
    if(isloc){
        return true;
    }else{
        return "Your location address is invalid";
    }
}

let zipVali = function(){
    let cusZip = $("#zip-address").val();
    if(cusZip.length == 0 || typeof(cusZip) == undefined){
        return true;
    }
    if($.isNumeric(cusZip)){
        if(cusZip.length <= 8){
            return true;
        }else{
            return "Your Zip code is oversize";
        }
    }else{
        return "Your Zip code contains invalid characters";
    }
}