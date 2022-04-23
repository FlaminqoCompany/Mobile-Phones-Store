function send_data_for_new_user(){
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var repeated_password = document.getElementById("repeated_password").value;

    if(email == ""){
        document.getElementById("email").style.border = "2px solid red";
        document.getElementById("email_validation").innerHTML = "You must enter your email!";
        document.getElementById("email_validation").style.display = "block";
        return;
    }
    else if(!ValidateEmail(email)){
        document.getElementById("email").style.border = "2px solid red";
        document.getElementById("email_validation").innerHTML = "You must enter valid email!";
        document.getElementById("email_validation").style.display = "block";
        return;
    }
    else if(password == ""){
        document.getElementById("password").style.border = "2px solid red";
        document.getElementById("password_validation").innerHTML = "You must enter your password!";
        document.getElementById("password_validation").style.display = "block";
        return;
    }
    else if(repeated_password == ""){
        document.getElementById("repeated_password").style.border = "2px solid red";
        document.getElementById("repeated_password_validation").innerHTML = "You must confirm your password!";
        document.getElementById("repeated_password_validation").style.display = "block";
        return;
    }
    else if(password.lenght < 8){
        document.getElementById("password").style.border = "2px solid red";
        document.getElementById("password_validation").innerHTML = "Your password must have more than 8 characters!";
        document.getElementById("password_validation").style.display = "block";
        return;
    }
    else if(password != repeated_password){
        document.getElementById("repeated_password").style.border = "2px solid red";
        document.getElementById("repeated_password_validation").innerHTML = "Passwords must be same!";
        document.getElementById("repeated_password_validation").style.display = "block";
        return;
    }
    
    if(email != "" && password.length > 8 && password == repeated_password && ValidateEmail(email)){
        document.getElementsByClassName("darker_background")[0].style.display = "block";
        $.ajax({
            type: "POST",
            url: "functionality/send_verification_email.php",
            data: {
                eml: email,
                psw: password
            },
            success: function(response){
                if(response == '1'){
                    //Prikaz polja za unos verifikacionog koda
                    document.getElementsByClassName("darker_background")[0].style.display = "none";
                    document.getElementById("ver_code_info").style.display = "block";
                    for(var i = 0; i < 5; i++)
                        document.getElementsByClassName("validation_code")[i].style.display = "inline-block";
                    
                    document.getElementById("email").disabled = true;
                    document.getElementById("password").disabled = true;
                    document.getElementById("repeated_password").disabled = true;
                    document.getElementsByClassName("sign_up_form_submit")[0].style.display = "none";
                    document.getElementsByClassName("sign_up_form_submit")[1].style.display = "block";
                    document.getElementById("send_again").style.display = "block";
                }
                else if(response == '3'){ 
                    document.getElementsByClassName("darker_background")[0].style.display = "none";
                    document.getElementById("email").style.border = "2px solid red";
                    document.getElementById("email_validation").innerHTML = "Email is already taken!";
                    document.getElementById("email_validation").style.display = "block";
                    return;
                }
            }
        });
    }
}
function ValidateEmail(mail) {
    if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail))
    {
        return (true)
    }
    return (false)
}

function check_verification_code(){
    var first = document.getElementsByClassName("validation_code")[0];
    var second = document.getElementsByClassName("validation_code")[1];
    var third = document.getElementsByClassName("validation_code")[2];
    var forth = document.getElementsByClassName("validation_code")[3];
    var fifth = document.getElementsByClassName("validation_code")[4];

    if(first.value == "")   first.style.border = "2px solid red";
    if(second.value == "")   second.style.border = "2px solid red";
    if(third.value == "")   third.style.border = "2px solid red";
    if(forth.value == "")   forth.style.border = "2px solid red";
    if(fifth.value == "")   fifth.style.border = "2px solid red";

    if(first.value != "" && second.value != "" && third.value != "" && forth.value != "" && fifth.value != ""){
        $.ajax({
            type: "POST",
            url: "functionality/check_validation_code.php",
            data: {
                one: first.value,
                two: second.value,
                three: third.value,
                four: forth.value,
                five: fifth.value
            },
            success: function(response){
                if(response == '1'){
                    window.location.href = "../index.php";
                }
            }
        });
    }
}

function on_change_input_function(x){
    x.style.border = "2px solid lightgrey";
    document.getElementById("email_validation").style.display = "none";
    document.getElementById("password_validation").style.display = "none";
    document.getElementById("repeated_password_validation").style.display = "none";
}

function resend_verification_code(){
    $.ajax({
        type: "POST",
        url: "functionality/resend_verification_code.php",
        success: function(response){
            console.log(response);
        }
    });
}