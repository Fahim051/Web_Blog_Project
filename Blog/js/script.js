function loginValidation(){
    var username = document.forms["loginform"]["username"]; //returns an array from the html form
    var password = document.forms["loginform"]["password"];

    if(username.value == ""){
        username.focus();
        window.alert("You must enter the username!");
        return false;
    }

    if(password.value == ""){
        password.focus();
        window.alert("You must enter the password!");
        return false;
    }

    return true;
}
