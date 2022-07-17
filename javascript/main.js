var mobile_phones = ["Alcatel", "Alpha", "Apple", "Asus", "Blackberry",
                     "Goclever", "Google", "Honor", "Huawei", "HTC",
                     "LG", "Motorola", "Nokia", "OnePlus", "Oppo", "Poco",
                     "Realme", "Samsung", "Sony", "Sony Ericsson", "Xiaomi", "Other"];

var alcatel_models = ["GO FLIP", "AXEL", "GLIPMSE",
                      "LUMOS", "APRISE", "LINKZONE",
                      "3V", "SMARTFLIP", "INSIGH",
                      "GO FLIP 3", "AVALON V", "GO FLIP V",
                      "ONYX", "IdealXTRA", "TETRA", "MYFLIP", "Other"];

var apple_models = ["iPhone SE (2022)", "iPhone 13 Pro Max", "iPhone 13 Pro",
                     "iPhone 13 mini", "iPhone 13", "iPhone 12 Pro", "iPhone 12 Pro Max",
                     "iPhone 12 mini", "iPhone 12", "iPhone SE (2020)", "iPhone 11 Pro",
                     "iPhone 11 Pro Max", "iPhone 11", "iPhone XR", "iPhone XS Max",
                     "iPhone XS", "iPhone 8", "iPhone 8 Plus", "iPhone X",
                     "iPhone 7 Plus", "iPhone 7", "iPhone SE", "iPhone 6s Plus",
                     "iPhone 6s", "iPhone 6 Plus", "iPhone 6", "iPhone 5s",
                     "iPhone 5c", "iPhone 5", "Other"];


var samsung_models = ["Galaxy S22 Ultra 5G", "Galaxy A53 5G", "Galaxy A13"];

var huawei_models = ["P50 Pro", "nova 9 SE", "Y9(2019)"];

function on_load_function(){
    var first = document.getElementById("main_menu_design");
    var second = document.getElementById("shop_by_categories_design");
    first.style.color = "#ff006a";
    first.style.borderBottom = "2px solid #ff006a";

    //show_preview();
    document.cookie.split(";").forEach(function(c) { 
        document.cookie = c.replace(/^ +/, "").replace(/=.*/, "=;expires=" + new Date().toUTCString() + ";path=/"); 
    });

}

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
    else if(email != "" && password.length > 8 && password == repeated_password && ValidateEmail(email)){
        document.getElementsByClassName("darker_background")[0].style.display = "block";
        $.ajax({
            type: "POST",
            url: "functionality/send_verification_email.php",
            data: {
                eml: email,
                psw: password
            },
            success: function(response){
                console.log(response);
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

function main_menu_click_function(){
    var first = document.getElementById("main_menu_design");
    var second = document.getElementById("shop_by_categories_design");

    second.style.color = "black";
    second.style.borderBottom = "2px solid transparent";

    first.style.color = "#ff006a";
    first.style.borderBottom = "2px solid #ff006a";
}

function shop_by_categories_click_function(){
    var first = document.getElementById("main_menu_design");
    var second = document.getElementById("shop_by_categories_design");

    first.style.color = "black";
    first.style.borderBottom = "2px solid transparent";

    second.style.color = "#ff006a";
    second.style.borderBottom = "2px solid #ff006a";
}

function show_tablet_menu(){
    document.getElementsByClassName("dark_background")[0].style.display = "block";
    document.getElementsByClassName("tablet_menu_container")[0].style.display = "block";
}
function close_tablet_menu(){
    document.getElementsByClassName("dark_background")[0].style.display = "none";
    if(document.getElementsByClassName("tablet_menu_container")[0].style.display == "block")
        document.getElementsByClassName("tablet_menu_container")[0].style.display = "none";
    else if(document.getElementsByClassName("bag_preview_container")[0].style.display == "block")
        document.getElementsByClassName("bag_preview_container")[0].style.display = "none";
}

function show_bag_preview_container(){
    document.getElementsByClassName("dark_background")[0].style.display = "block";
    document.getElementsByClassName("bag_preview_container")[0].style.display = "block";
    // Prikaz sadrzaja omiljenih oglasa
    var child = document.getElementById("favorite_ads_show").lastElementChild; 
    while (child) {
        document.getElementById("favorite_ads_show").removeChild(child);
        child = document.getElementById("favorite_ads_show").lastElementChild;
    }
    $.ajax({
        type: "POST",
        url: "get_favorite_ads.php",
        success: function(response){
            resultobj = JSON.parse(response);
            for(var i = 0; i < resultobj.length; i++){
                var lokacija = "main_images/" + resultobj[i]["brand"] + " " + resultobj[i]["model"] + ".jpg";
                
                var main_div = document.getElementById("favorite_ads_show");
                    var ads_main_container = document.createElement("div");
                    ads_main_container.classList.add("newest_ads_main_container");
                        var ads_image_container = document.createElement("div");
                        ads_image_container.style.backgroundImage = "url('"+lokacija+"')";
                        ads_image_container.classList.add("newest_ads_image_container");
                        
                        ads_main_container.appendChild(ads_image_container);
                        
                        var ads_information_container = document.createElement("div");
                        ads_information_container.classList.add("newest_ads_info_container");
                            var ads_title_container = document.createElement("div");
                            ads_title_container.classList.add("newest_ads_title_container");
                                var ads_title = document.createElement("p");
                                ads_title.innerHTML = resultobj[i]["title"];
                                ads_title_container.appendChild(ads_title);
                            ads_information_container.appendChild(ads_title_container);
                            var ads_price_container = document.createElement("div");
                            ads_price_container.classList.add("newest_ads_price_container");
                                var ads_price = document.createElement("p");
                                if(resultobj[i]["price"] != "-1")
                                    ads_price.innerHTML = resultobj[i]["price"] + "€";
                                else
                                    ads_price.innerHTML = "Dogovor";
                                ads_price_container.appendChild(ads_price);
                            ads_information_container.appendChild(ads_price_container);
                        ads_main_container.appendChild(ads_information_container);
                        
                        var clickable_div = document.createElement("div");
                        clickable_div.classList.add("clickable_div");
                        ads_main_container.appendChild(clickable_div);
                    main_div.appendChild(ads_main_container);
                        var linija = document.createElement("hr");
                        main_div.appendChild(linija);
            }
        }
    });
}

function show_bag_preview_container1(){
    document.getElementsByClassName("dark_background")[0].style.display = "block";
    document.getElementsByClassName("bag_preview_container")[0].style.display = "block";
    // Prikaz sadrzaja omiljenih oglasa
    var child = document.getElementById("favorite_ads_show").lastElementChild; 
    while (child) {
        document.getElementById("favorite_ads_show").removeChild(child);
        child = document.getElementById("favorite_ads_show").lastElementChild;
    }
    $.ajax({
        type: "POST",
        url: "functionality/get_favorite_ads.php",
        success: function(response){
            resultobj = JSON.parse(response);
            for(var i = 0; i < resultobj.length; i++){
                var lokacija = "functionality/main_images/" + resultobj[i]["brand"] + " " + resultobj[i]["model"] + ".jpg";
                
                var main_div = document.getElementById("favorite_ads_show");
                    var ads_main_container = document.createElement("div");
                    ads_main_container.classList.add("newest_ads_main_container");
                        var ads_image_container = document.createElement("div");
                        ads_image_container.style.backgroundImage = "url('"+lokacija+"')";
                        ads_image_container.classList.add("newest_ads_image_container");
                        
                        ads_main_container.appendChild(ads_image_container);
                        
                        var ads_information_container = document.createElement("div");
                        ads_information_container.classList.add("newest_ads_info_container");
                            var ads_title_container = document.createElement("div");
                            ads_title_container.classList.add("newest_ads_title_container");
                                var ads_title = document.createElement("p");
                                ads_title.innerHTML = resultobj[i]["title"];
                                ads_title_container.appendChild(ads_title);
                            ads_information_container.appendChild(ads_title_container);
                            var ads_price_container = document.createElement("div");
                            ads_price_container.classList.add("newest_ads_price_container");
                                var ads_price = document.createElement("p");
                                if(resultobj[i]["price"] != "-1")
                                    ads_price.innerHTML = resultobj[i]["price"] + "€";
                                else
                                    ads_price.innerHTML = "Dogovor";
                                ads_price_container.appendChild(ads_price);
                            ads_information_container.appendChild(ads_price_container);
                        ads_main_container.appendChild(ads_information_container);
                        
                        var clickable_div = document.createElement("div");
                        clickable_div.classList.add("clickable_div");
                        ads_main_container.appendChild(clickable_div);
                    main_div.appendChild(ads_main_container);
                        var linija = document.createElement("hr");
                        main_div.appendChild(linija);
            }
        }
    });
}

function close_bag_preview_container(){
    document.getElementsByClassName("dark_background")[0].style.display = "none";
    document.getElementsByClassName("bag_preview_container")[0].style.display = "none";
}

function show_login_large_devices(){
    document.getElementsByClassName("responsive_background")[0].style.display = "block";
    document.getElementsByClassName("login_large_device")[0].style.display = "block";
}
function close_login_large_device(){
    document.getElementsByClassName("responsive_background")[0].style.display = "none";
    document.getElementsByClassName("login_large_device")[0].style.display = "none";
}

function login_large(){
    var eml = document.getElementById("email_login");
    var psw = document.getElementById("password_login");

    var incorrect_email = document.getElementById("email_validation_login");
    var incorrect_password = document.getElementById("password_validation_login");

    if(eml.value == ""){
        eml.style.border = "2px solid red";
        incorrect_email.innerHTML = "Please enter your email!";
        incorrect_email.style.display = "block";
    }
    else if(psw.value == ""){
        psw.style.border = "2px solid red";
        incorrect_password.innerHTML = "Please enter your password!";
        incorrect_password.style.display = "block";
    }
    else{
        $.ajax({
            type: "POST",
            url: "functionality/login.php",
            data:{
                email: eml.value,
                password: psw.value,
            },
            success: function(response){
                switch(response){
                    case "1":
                        alert("Prijavili ste se!");
                        break;
                    case "2":
                        psw.style.border = "2px solid red";
                        incorrect_password.innerHTML = "Incorrect password!";
                        incorrect_password.style.display = "block";
                        break;
                    case "3":
                        eml.style.border = "2px solid red";
                        incorrect_email.innerHTML = "User doesn't exist!";
                        incorrect_email.style.display = "block";
                        break;
                    default:
                        break;
                }
            }
        });
    }
}
function change_login_large(){
    var eml = document.getElementById("email_login");
    var psw = document.getElementById("password_login");

    var incorrect_email = document.getElementById("email_validation_login");
    var incorrect_password = document.getElementById("password_validation_login");

    eml.style.border = "2px solid lightgrey";
    psw.style.border = "2px solid lightgrey";

    incorrect_email.style.display = "none";
    incorrect_password.style.display = "none";
}

function show_mobile_phones(x){
    setCookie("category", "mobile_phone", 1);

    var model_phones_container = document.getElementById("mobile_phones");
    var child = model_phones_container.lastElementChild; 
    while (child) {
        model_phones_container.removeChild(child);
        child = model_phones_container.lastElementChild;
    }
    document.getElementById("mobile_phones").style.display = "inline-block";
    x.style.backgroundColor = "#ff006a";
    x.style.color = "white";
    document.getElementById("choose_brand_text").style.display = "inline-block";
    var mobile_phones_container = document.getElementById("mobile_phones");
    
    for(var i = 0; i < mobile_phones.length; i++){
        var div_element = document.createElement("div");
        div_element.classList.add("same_categories_container");
        div_element.classList.add("same1");
        var h4_element = document.createElement("h4");
        h4_element.classList.add("mobile_phones_text_design");
        h4_element.innerHTML = mobile_phones[i];
        div_element.addEventListener("click", show_mobile_phone_model);
        div_element.appendChild(h4_element);
        mobile_phones_container.appendChild(div_element);
    }
}
function show_mobile_phone_model(){
    setCookie("mobile_phone_brand", this.firstChild.innerHTML, 1);
    setCookie("mobile_phone_model", "", 1);
    document.getElementsByClassName("next_step_button_desing")[0].disabled = true;
    document.getElementsByClassName("next_step_button_desing")[0].style.opacity = "0.3";
    document.getElementById("choose_model_text").style.display = "inline-block";

    document.getElementById("choose_category_container").style.backgroundColor = "white";
    document.getElementById("choose_category_container").style.color = "black";
    
    var elements = document.getElementsByClassName("same1");
    for (var i = 0, len = elements.length; i < len; i++) {
        elements[i].style.backgroundColor = "white";
        elements[i].style.color = "black";
    }
    this.style.backgroundColor = "#ff006a";
    this.style.color = "white";
    
    var model_phones_container = document.getElementById("phone_models");
    var child = model_phones_container.lastElementChild; 
    while (child) {
        model_phones_container.removeChild(child);
        child = model_phones_container.lastElementChild;
    }
    switch(this.firstChild.innerHTML){
        case "Alcatel":
            for(var i = 0; i < alcatel_models.length; i++){
                var div_element = document.createElement("div");
                div_element.classList.add("same_categories_container");
                div_element.classList.add("same2");
                var h4_element = document.createElement("h4");
                h4_element.classList.add("mobile_phones_text_design");
                h4_element.innerHTML = alcatel_models[i];
                div_element.appendChild(h4_element);
                div_element.addEventListener("click", select_mobile_phone_model);
                model_phones_container.appendChild(div_element);
            }
            break;
        case "Apple":
            for(var i = 0; i < apple_models.length; i++){
                var div_element = document.createElement("div");
                div_element.classList.add("same_categories_container");
                div_element.classList.add("same2");
                var h4_element = document.createElement("h4");
                h4_element.classList.add("mobile_phones_text_design");
                h4_element.innerHTML = apple_models[i];
                div_element.appendChild(h4_element);
                div_element.addEventListener("click", select_mobile_phone_model);
                model_phones_container.appendChild(div_element);
            }
            break;
        case "Samsung":
            for(var i = 0; i < samsung_models.length; i++){
                var div_element = document.createElement("div");
                div_element.classList.add("same_categories_container");
                div_element.classList.add("same2");
                var h4_element = document.createElement("h4");
                h4_element.classList.add("mobile_phones_text_design");
                h4_element.innerHTML = samsung_models[i];
                div_element.appendChild(h4_element);
                div_element.addEventListener("click", select_mobile_phone_model);
                model_phones_container.appendChild(div_element);
            }
            break;
        case "Huawei":
            for(var i = 0; i < samsung_models.length; i++){
                var div_element = document.createElement("div");
                div_element.classList.add("same_categories_container");
                div_element.classList.add("same2");
                var h4_element = document.createElement("h4");
                h4_element.classList.add("mobile_phones_text_design");
                h4_element.innerHTML = huawei_models[i];
                div_element.appendChild(h4_element);
                div_element.addEventListener("click", select_mobile_phone_model);
                model_phones_container.appendChild(div_element);
            }
            break;
    }
}

function select_mobile_phone_model(){
    setCookie("mobile_phone_model", this.firstChild.innerHTML, 1);
    var elements = document.getElementsByClassName("same2");
    for (var i = 0, len = elements.length; i < len; i++) {
        elements[i].style.backgroundColor = "white";
        elements[i].style.color = "black";
    }
    this.style.backgroundColor = "#ff006a";
    this.style.color = "white";
    
    if(getCookie("category") != null && getCookie("mobile_phone_brand") != null && getCookie("mobile_phone_model") != null){
        document.getElementsByClassName("next_step_button_desing")[0].disabled = false;
        document.getElementsByClassName("next_step_button_desing")[0].style.opacity = "1";
    }
    else{
        document.getElementsByClassName("next_step_button_desing")[0].disabled = true;
        document.getElementsByClassName("next_step_button_desing")[0].style.opacity = "0.3";
    }
}

function next_step_one(){
    if(getCookie("category") != null && getCookie("mobile_phone_brand") != null && getCookie("mobile_phone_model") != null){
        document.getElementById("choose_category_container").style.backgroundColor = "#ff006a";
        document.getElementById("choose_category_container").style.color = "white";
        document.getElementById("choose_category_info").innerHTML = "Gotovo!";
        document.getElementById("choose_mobile_phone_brand_container").style.borderBottom = "2px solid #ff006a";
        document.getElementById("categories_container").style.display = "none";
        document.getElementById("main_information").style.display = "block";

        document.getElementById("choose_category_container").addEventListener("click", function(){
            document.getElementById("main_information").style.display = "none";
            document.getElementById("price_image_container").style.display = "none";
            document.getElementById("categories_container").style.display = "block";
            document.getElementById("choose_mobile_phone_brand_container").style.borderBottom = "2px solid transparent";
        });
        document.getElementById("mobile_phone_name").innerHTML = getCookie("mobile_phone_model");
    }
}

function project_title_change(x){
    document.getElementById("next_step").disabled = true;
    document.getElementById("next_step").style.opacity = "0.3";

    var err = document.getElementById("project_title_error");
    err.style.display = "none";
    x.style.border = "2px solid lightgrey";
    if(x.value.length > 20 && x.value.length < 50){
        x.style.border = "2px solid lightgreen";
        specification_change(x);
    }
    else if(x.value.length <= 20){
        err.innerHTML = "Project title must have more than 20 characters";
        err.style.display = "block";
        x.style.border = "2px solid red";
    }
    else if(x.value.length >= 50){
        err.innerHTML = "Project title must have less than 50 characters";
        err.style.display = "block";
        x.style.border = "2px solid red";
    }
}

function phone_number_change(x){
    document.getElementById("next_step").disabled = true;
    document.getElementById("next_step").style.opacity = "0.3";
    var err = document.getElementById("phone_number_error");
    err.style.display = "none";
    x.style.border = "2px solid lightgrey";

    var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;

    if(x.value.match(phoneno)){
        x.style.border = "2px solid lightgreen";
        specification_change(x);
	}
    else{
        err.innerHTML = "Not a valid phone number";
        err.style.display = "block";
        x.style.border = "2px solid red";
    }
}
var state = 0;
function select_new(x){
    state = 0;
    var new_phone = document.getElementsByClassName("new_used")[0];
    var used_phone = document.getElementsByClassName("new_used")[1];

    used_phone.style.backgroundColor = "lightgrey";
    used_phone.style.border = "2px solid lightgrey";
    used_phone.style.color = "black";

    new_phone.style.backgroundColor = "#ff006a";
    new_phone.style.border = "2px solid #ff006a";
    new_phone.style.color = "white";
}
function select_used(x){
    state = 1;
    var new_phone = document.getElementsByClassName("new_used")[0];
    var used_phone = document.getElementsByClassName("new_used")[1];

    new_phone.style.backgroundColor = "lightgrey";
    new_phone.style.border = "2px solid lightgrey";
    new_phone.style.color = "black";

    used_phone.style.backgroundColor = "#ff006a";
    used_phone.style.border = "2px solid #ff006a";
    used_phone.style.color = "white";
}

function specification_change(x){
    if(x.value != "")
        x.style.border = "2px solid lightgreen";
    else
        x.style.border = "2px solid red";
        
    var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;

    if((document.getElementById("project_title_value").value.length > 20 && document.getElementById("project_title_value").value.length < 50) &&
    document.getElementById("phone_number_value").value.match(phoneno)){
        document.getElementById("next_step").disabled = false;
        document.getElementById("next_step").style.opacity = "1";
    }
    else{
        document.getElementById("next_step").disabled = true;
        document.getElementById("next_step").style.opacity = "0.3";
    }
}

function previus_step_two(){
    document.getElementById("main_information").style.display = "none";
    document.getElementById("categories_container").style.display = "block";
    document.getElementById("choose_mobile_phone_brand_container").style.borderBottom = "2px solid transparent";
}
function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }
function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') {
        c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
        }
    }
    return "";
}

function next_step_two(){
    var phoneno = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/;
    
    if((document.getElementById("project_title_value").value.length > 20 && document.getElementById("project_title_value").value.length < 50) &&
    document.getElementById("phone_number_value").value.match(phoneno)){
        setCookie("naslov_value", document.getElementById("project_title_value").value, 1);
        setCookie("broj_telefona_value", document.getElementById("phone_number_value").value, 1);
        setCookie("stanje_value", state, 1);
        document.getElementById("main_information").style.display = "none";
        document.getElementById("price_image_container").style.display = "block";

        document.getElementById("choose_mobile_phone_brand_container").style.color = "white";
        document.getElementById("choose_mobile_phone_brand_container").style.backgroundColor = "#ff006a";
        document.getElementById("opis_proizvoda_completed").innerHTML = "Gotovo!";

        document.getElementById("pricing_and_images").style.borderBottom = "2px solid #ff006a";
    }
    else{
    }
}
var selected_images = 0, br = 0, br2 = 0;
var form_data = new FormData();
function select_images_change(event){

    var inp = document.getElementById("select_images");
    const boxes = Array.from(document.getElementsByClassName('upload_image_icon_to_remove'));

    boxes.forEach(box => {
        box.remove();
    });
    const files = inp.files;

    for(var i = 0; i < files.length && selected_images < 10; i++){
        form_data.append("image", files[i]);
        var el = document.createElement("div");
        el.classList.add("col-6");
        el.classList.add("upload_image");
        el.id = ("id_" + br2);
        var src = URL.createObjectURL(event.target.files[i]);
        var el_img = document.createElement("img");
        el_img.src = src;
        el_img.classList.add("w-100");
        el_img.classList.add("h-100");
        el_img.classList.add("image_to_store");
        el_img.id =(br2++);
        el_img.style.objectFit = "contain";
        var remove_img = document.createElement("img");
        remove_img.src = "images/remove_image.png";
        remove_img.classList.add("upload_image_remove");
        el.appendChild(el_img);
        el.appendChild(remove_img);
        document.getElementById("uploaded_images_preview").appendChild(el);
        br = 0;

        remove_img.addEventListener("click", function(){
            /*var id_value = this.parentNode.id;
            var br_value = id_value.split('_')[1];
            form_data.set("image"+br_value, "");*/
            this.parentNode.style.display = "none";
            selected_images--;
            if (br == 0){
                var el = document.createElement("div");
                el.classList.add("col-6");
                el.classList.add("d-inline-block");
                el.classList.add("upload_image");
                el.classList.add("upload_image_icon_to_remove");
                var el_img = document.createElement("img");
                el_img.src = "images/upload.png";
                el_img.classList.add("upload_image_icon");
                el_img.style.objectFit = "contain";
                el.appendChild(el_img);
                el.addEventListener("click", function(){
                    document.getElementById('select_images').click();
                });
                if(selected_images == 9)
                    document.getElementById("uploaded_images_preview").appendChild(el);
                br = 1;
            }
        });
        selected_images++;
    }
    if(selected_images < 10){
        var el = document.createElement("div");
        el.classList.add("col-6");
        el.classList.add("d-inline-block");
        el.classList.add("upload_image");
        el.classList.add("upload_image_icon_to_remove");
        var el_img = document.createElement("img");
        el_img.src = "images/upload.png";
        el_img.classList.add("upload_image_icon");
        el_img.style.objectFit = "contain";
        el.appendChild(el_img);
        el.addEventListener("click", function(){
            document.getElementById('select_images').click();
        });
        document.getElementById("uploaded_images_preview").appendChild(el);
    }
}

function project_description_change(x){
    if(x.value.length < 30){
        document.getElementById("project_description_error").innerHTML = "Morate uneti opis duzi od 30 karaktera!";
        document.getElementById("project_description_error").style.display = "block";
        x.style.border = "2px solid red";
    }
    else{
        document.getElementById("project_description_error").style.display = "none";
        x.style.border = "2px solid lightgrey";
    }

    if(x.value.length >= 30 && (document.getElementById("project_price").value.length > 0 || document.getElementById("call_for_price").checked)){
        document.getElementById("next_step_three").style.opacity = "1";
        document.getElementById("next_step_three").disabled = false;
    }
    else{
        document.getElementById("next_step_three").style.opacity = "0.3";
        document.getElementById("next_step_three").disabled = true;
    }
}

function project_price_change(x){
    if(x.value == 0 && !document.getElementById("call_for_price").checked){
        x.style.border = "2px solid red";
    }
    else{
        x.style.border = "2px solid lightgrey";
    }

    if(document.getElementById("project_description_value").value.length >= 30 && (x.value.length > 0 || document.getElementById("call_for_price").checked)){
        document.getElementById("next_step_three").style.opacity = "1";
        document.getElementById("next_step_three").disabled = false;
    }
    else{
        document.getElementById("next_step_three").style.opacity = "0.3";
        document.getElementById("next_step_three").disabled = true;
    }
}
function call_price(x){
    if(x.checked){
        document.getElementById("project_price").style.border = "2px solid lightgrey";
        document.getElementById("project_price").disabled = true;
        document.getElementById("project_price").value = "";
    }
    else if(!x.checked && document.getElementById("project_price").value.length == 0){
        document.getElementById("project_price").style.border = "2px solid red";
        document.getElementById("project_price").disabled = false;
    }

    if(document.getElementById("project_description_value").value.length >= 30 && (document.getElementById("project_price").value.length > 0 || x.checked)){
        document.getElementById("next_step_three").style.opacity = "1";
        document.getElementById("next_step_three").disabled = false;
    }
    else{
        document.getElementById("next_step_three").style.opacity = "0.3";
        document.getElementById("next_step_three").disabled = true;
    }
}

function goto_main_information(){
    if(getCookie("category") != "" && getCookie("mobile_phone_brand") != "" && getCookie("mobile_phone_model") != ""){
        document.getElementById("main_information").style.display = "block";
        document.getElementById("price_image_container").style.display = "none";
        document.getElementById("categories_container").style.display = "none";
        document.getElementById("choose_mobile_phone_brand_container").style.borderBottom = "2px solid #ff006a";
        document.getElementById("pricing_and_images").style.borderBottom = "2px solid transparent";
    }
}

function next_step_three(){
    
    $.ajax({
        type: "POST",
        url: "functionality/upload_new_ad.php",
        data: {
            category: getCookie("category"),
            brand: getCookie("mobile_phone_brand"),
            model: getCookie("mobile_phone_model"),
            title: getCookie("naslov_value"),
            phone_number: getCookie("broj_telefona_value"),
            state: getCookie("stanje_value"),
            description: getCookie("opis_value"),
            notes: getCookie("napomene_value"),
            price: getCookie("cena_value"),
        },
        success: function(response){
            if(response == '1')
                import_images_to_folder();
        }
    });
}

function import_images_to_folder(){
    $.ajax({
        type: "POST",
        url: "functionality/import_images.php",
        data: form_data,
        dataType: "json",
        contentType: false,
        processData: false,
        success: function(response){
        }
    });
}

function show_preview(){
    document.getElementById("preview").s
    document.getElementById('pricing_and_images').style.backgroundColor = "#ff006a";
    document.getElementById('pricing_and_images').style.color = "white";

    setCookie("opis_value", document.getElementById("project_description_value").value, 1);
    setCookie("napomene_value", document.getElementById("project_notes_value").value, 1);
    if(!document.getElementById("call_for_price").checked) setCookie("cena_value", document.getElementById("project_price").value, 1);
    else setCookie("cena_value","-1", 1);

    document.getElementById('price_image_container').style.display = "none";
    document.getElementById('preview_container').style.display = "block";


    var category= getCookie("category");
    var brand = getCookie("mobile_phone_brand");
    var model = getCookie("mobile_phone_model");
    var title = getCookie("naslov_value");
    var phone_number = getCookie("broj_telefona_value");
    var state = getCookie("stanje_value");
    var description = getCookie("opis_value");
    var notes = getCookie("napomene_value");
    var price = getCookie("cena_value");

    var short_description = "";
    if(description.length > 200){
        for(var i = 0; i < 200; i++)
            short_description += description[i];
        short_description += "...";
    }
    else{
        short_description = description;
    }

    document.getElementById("price_preview").innerHTML = price + "€";
    document.getElementById('title_preview').innerHTML = title;
    document.getElementById('description_preview').innerHTML = short_description;
    document.getElementById('brand_preview').innerHTML = brand;
    document.getElementById('brand_model_preview').innerHTML = brand + " " + model;
    document.getElementById('category_preview').innerHTML = category;
    document.getElementById('notes_preview').innerHTML = notes;
    document.getElementById('phone_number_preview').innerHTML = phone_number;
    document.getElementById('opis_text').innerHTML = description;
    if(state == 0)
        document.getElementById('state_preview').innerHTML = "Novo";
    else
        document.getElementById('state_preview').innerHTML = "Polovno";
    
    var imagesrc = "Main Images/";
    var mobile = brand + " " + model;
    imagesrc += mobile + ".png";

    document.getElementById("main_image").src = imagesrc;
    var all_images = form_data.getAll("image");
    for(var i = 0; i < all_images.length; i++){
        var el = document.createElement("div");
        el.classList.add("small_images_div");
        var slika = document.createElement("img");
        const reader = new FileReader();
        slika.classList.add("small_image");
        el.appendChild(slika);
        document.getElementById("small_images_main_container").appendChild(el);
    }

    var brand = getCookie("mobile_phone_brand");
    var model = getCookie("mobile_phone_model");

    var exist = 0;
    var file_name;

    switch(brand){
        case "Apple":
            file_name = "apple.csv";
            break;
        case "Samsung":
            file_name = "samsung.csv";
            break;
        case "Asus":
            file_name = "asus.csv";
            break;
        case "Huawei":
            file_name = "huawei.csv";
            break;
        case "Alcatel":
            file_name = "alcatel.csv";
            break;
    }
    var tabela = document.getElementById('tabela');
    Papa.parse(file_name, {
        download: true,
        complete: function(results) {
            for(var i = 0; i < results.data.length; i++){
                if(results.data[i][0] == brand && results.data[i][1] == model){
                    Papa.parse('gsm.csv', {
                        download: true,
                        complete: function(results2) {
                            for(var j = 0; j < results2.data[0].length; j++){
                                var tr = document.createElement('tr');
        
                                var th = document.createElement('th');
                                th.classList.add("prva_kolona");
                                var text = document.createTextNode(results2.data[0][j]);
                                th.appendChild(text);
                                tr.appendChild(th);
        
                                var th2 = document.createElement('th');
                                th2.classList.add("druga_kolona");
                                if(results.data[i][j] != '') var text2 = document.createTextNode(results.data[i][j]);
                                else var text2 = document.createTextNode('/');
                                th2.appendChild(text2);
                                tr.appendChild(th2);
        
                                tabela.appendChild(tr);
                            }
                        }
                    });
                    break;
                }
                else
                    x = -1;
            }
        }
    });
}

function specifications_show(){
    document.getElementById('description_main_container').style.display = "none";
    document.getElementById('specification_main_container').style.display = "block";
    document.getElementById('dugme_specifikacije').style.borderBottom = "2px solid #ff006a";
    document.getElementById('dugme_specifikacije').style.color = "#ff006a";
    document.getElementById('dugme_opis').style.borderBottom = "2px solid transparent";
    document.getElementById('dugme_opis').style.color = "black";
}

function description_show(){
    document.getElementById('specification_main_container').style.display = "none";
    document.getElementById('description_main_container').style.display = "block";
    document.getElementById('dugme_opis').style.borderBottom = "2px solid #ff006a";
    document.getElementById('dugme_opis').style.color = "#ff006a";
    document.getElementById('dugme_specifikacije').style.borderBottom = "2px solid transparent";
    document.getElementById('dugme_specifikacije').style.color = "black";
}

function previous_step_three(){
    document.getElementById('preview_container').style.display = "none";
    document.getElementById('price_image_container').style.display = "block";
}
function goto_pricing(){
    if(getCookie("naslov_value") != "" && getCookie("broj_telefona_value") != "" && getCookie("stanje_value")){
        document.getElementById("main_information").style.display = "none";
        document.getElementById("price_image_container").style.display = "block";
        document.getElementById("categories_container").style.display = "none";
        document.getElementById("pricing_and_images").style.borderBottom = "2px solid #ff006a";
    }
}
var br = 0;
function show_all_ads(st=1, en=12){
    var num_rows = 0;
    $.ajax({
        type: "POST",
        url: "functionality/get_num_rows.php",
        success: function(response){
            num_rows = response;
            document.getElementById("founded_ads").innerHTML = num_rows;
        }
    });
    $.ajax({
        type: "POST",
        url: "functionality/all_ads.php",
        data: {
            start: st,
            end: en
        },
        success: function(response){
            try{
                resultobj = JSON.parse(response);
                var main_div = document.getElementById('ads_preview_main');
                br += resultobj.length;
                for(var i = 0; i < resultobj.length; i++){
                    var div_el = document.createElement('div');
                    div_el.classList.add("d-inline-block");
                    div_el.classList.add("col-4");
                    div_el.classList.add("ads_preview");
                    var div_el2 = document.createElement('div');
                    div_el2.classList.add("ads_preview_image_container");
                    var img_el = document.createElement("img");
                    var img_src = "functionality/main_images/" + resultobj[i]["brand"] + " " + resultobj[i]["model"] + ".jpg";
                    img_el.src = img_src;
                    img_el.classList.add("ads_preview_image");
                    div_el2.appendChild(img_el);
                    div_el.appendChild(div_el2);

                    var div_el3 = document.createElement('div');
                    div_el3.classList.add('ads_preview_info_container');
                    var p_el = document.createElement('p');
                    p_el.innerHTML = resultobj[i]["category"];
                    var h5_el = document.createElement('h5');
                    var title = "";
                    var ttl = resultobj[i]['title'];
                    for(var j = 0; j < 35 && ttl.length > 35; j++)
                        title += ttl[j];
                    title += "...";
                    if(title != "...")
                        h5_el.innerHTML = title;
                    else
                        h5_el.innerHTML = ttl;
                    var p_el3 = document.createElement('p');
                    if(resultobj[i]["state"] == 1)
                        p_el3.innerHTML = 'Polovno';
                    else
                        p_el3.innerHTML = "Novo";
                    var p_el2 = document.createElement('p');
                    if(resultobj[i]['price'] == -1)
                        p_el2.innerHTML = "Dogovor";
                    else
                        p_el2.innerHTML = resultobj[i]['price'] + "€";
                    p_el2.classList.add("price_show");

                    var following = document.createElement("div");
                    following.classList.add("following_div");
                    var elsrce = document.createElement("p");
                    elsrce.innerHTML = "❤ ";
                    var spanel = document.createElement("span");

                    spanel.innerHTML = resultobj[i]["favorites_count"];

                    elsrce.appendChild(spanel);
                    elsrce.style.color = "#ed0b69";
                    elsrce.style.fontSize = "14px";
                    elsrce.style.float = "right";
                    following.appendChild(elsrce);
                    
                    div_el3.appendChild(p_el);
                    div_el3.appendChild(h5_el);
                    div_el3.appendChild(p_el3);
                    div_el3.appendChild(p_el2);
                    div_el3.appendChild(following);

                    div_el.appendChild(div_el3);

                    var click_div = document.createElement('div');
                    click_div.classList.add("onclick_ads");

                    var precicediv = document.createElement("div");
                    precicediv.classList.add("poravnato_desno");

                    var srcediv = document.createElement("div");
                    srcediv.classList.add("precice_bg");
                    srcediv.addEventListener("click", function(event){
                        event.stopPropagation();
                        alert("Dodati u omiljeno");
                    });
                    var srce = document.createElement("img");
                    srce.src = "images/heart.png";
                    srcediv.title = "Dodaj u omiljenje";
                    srcediv.addEventListener("click", quick_add_to_favorite);
                    srcediv.appendChild(srce);
                    precicediv.appendChild(srcediv);

                    srcediv = document.createElement("div");
                    srcediv.classList.add("precice_bg");
                    srcediv.id = resultobj[i]["id"];
                    srcediv.addEventListener("click", function(event){
                        event.stopPropagation();
                        $.ajax({
                            type: "POST",
                            url: "functionality/selectadcontent.php",
                            data: {id: this.id},
                            success: function(response){
                                document.getElementsByClassName("dark_backgroundd")[0].style.display = "block";
                                document.getElementsByClassName("quick_preview_main_div")[0].style.display = "block";
                                resultobjj = JSON.parse(response);
                                if(resultobjj[0]["category"] == "mobile_phone")
                                    document.getElementById("categories_preview").innerHTML = "Mobilni Telefoni";
                                var lokacija = "functionality/main_images/" + resultobjj[0]["brand"] + " " + resultobjj[0]["model"] + ".png";
                                document.getElementById("zoomC").style.backgroundImage = "url('"+lokacija+"')";
                                document.getElementById("title").innerHTML = resultobjj[0]["title"];
                                var opis = resultobjj[0]["description"];
                                if(opis.length > 150){
                                    var newopis = "";
                                    for(var i = 0; i < 150; i++)
                                        newopis += opis[i];
                                    newopis += "...";
                                    document.getElementById("description_preview").innerHTML = newopis;
                                }
                                else
                                    document.getElementById("description_preview").innerHTML = resultobjj[0]["description"];
                            
                                document.getElementById("notes_preview").innerHTML = resultobjj[0]["notes"];
                                if(resultobjj[0]["price"] != "-1")
                                    document.getElementById("price_preview").innerHTML = resultobjj[0]["price"] + "€";
                                else
                                    document.getElementById("price_preview").innerHTML = "Dogovor";
                            }
                        })
                    });
                    srce = document.createElement("img");
                    srce.src = "images/extend.png";
                    srcediv.title = "Brzi prikaz";
                    srcediv.appendChild(srce);
                    precicediv.appendChild(srcediv);

                    click_div.appendChild(precicediv);

                    click_div.id = resultobj[i]["id"];
                    click_div.addEventListener("click", function(){
                        location.href = "functionality/add-view.php?id=" + this.id;
                    });

                    div_el.appendChild(click_div);
                    main_div.appendChild(div_el);
                }
            }
            catch(e){
                document.getElementById("founded_ads").innerHTML = 0;
            }
            if(br < num_rows){
                var loadMore = document.createElement("button");
                loadMore.innerHTML = "Ucitaj jos";
                loadMore.classList.add("load_more_button");
                loadMore.addEventListener("click", function(){
                    if(num_rows-br >= 12) show_all_ads(en, 12);
                    else show_all_ads(en, num_rows-br);
                    this.style.display = "none";
                })
                main_div.appendChild(loadMore);
            }
        }
    });
}
function index_onload(){
    show_all_ads();
    $.ajax({
        type: "POST",
        url: "functionality/check_login_status.php",
        success: function(response){
            if(response == "2" || response == "3"){
                document.getElementById("login_button").addEventListener("click", show_login_large_devices());
            }
            else{
                document.getElementById("login_button").src = "data:image;base64,"+response;
                document.getElementById("login_button").style.borderRadius = "10px";
                document.getElementById("login_button").style.width = "25px";
                document.getElementById("login_button").style.height = "25px";
                document.getElementById("login_button").style.objectFit = "contain";
                document.getElementById("login_button").style.border = "1px solid black";
                document.getElementById("login_button").addEventListener("click", function(){
                    alert("Hello");
                })
            }
        }
    });
}

function close_quick_preview(){
    document.getElementsByClassName("dark_backgroundd")[0].style.display = "none";
    document.getElementsByClassName("quick_preview_main_div")[0].style.display = "none";
}



let imagefolder, brandsql, modelsql, img_index = -1, br3 = 0;
let oglas_id;

function loadf(x){
    document.getElementById("zoomC").style.backgroundImage = "url('https://istyle.rs/media/catalog/product/cache/image/e9c3970ab036de70892d86c6d221abfe/i/p/iphone_13_midnight_pdp_image_position-1a__wwen_1_1.jpg')";
    //document.getElementById("zoomC1").style.backgroundImage = "url('https://istyle.rs/media/catalog/product/cache/image/e9c3970ab036de70892d86c6d221abfe/i/p/iphone_13_midnight_pdp_image_position-1a__wwen_1_1.jpg')";
    document.getElementsByClassName("additional_information")[0].borderBottom = "2px solid red";
    setCookie("ad_id", x, 1);
    $.ajax({
        type: "POST",
        url: "selectadcontent.php",
        data: {id: x},
        success: function(response){
            resultobj = JSON.parse(response);
            oglas_id = resultobj[0]["id"];
            document.getElementsByClassName("data")[1].innerHTML = resultobj[0]["category"];
            if(resultobj[0]["category"] == "mobile_phone")
                document.getElementById("categories_preview").innerHTML = "Mobilni Telefoni";
            document.getElementsByClassName("data")[2].innerHTML = resultobj[0]["brand"];
            document.getElementsByClassName("data")[3].innerHTML = resultobj[0]["model"];

            var lokacija = "main_images/" + resultobj[0]["brand"] + " " + resultobj[0]["model"] + ".png";
            var model_lokacija = "assets/" + resultobj[0]["brand"] + " " + resultobj[0]["model"] + "/scene.gltf";

            document.getElementById("pregled_modela").setAttribute("src", model_lokacija);
            document.getElementById("pregled_modela").setAttribute("ios-src", model_lokacija);
            document.getElementById("pregled_modela").setAttribute("alt", "Model trenutno nije dostupan ili je doslo do greske. Molimo pokusajte kasnije!");
            document.getElementById("zoomC").style.backgroundImage = "url('"+lokacija+"')";
            //document.getElementById("zoomC1").style.backgroundImage = "url('"+lokacija+"')";

            document.getElementById("title").innerHTML = resultobj[0]["title"];
            document.getElementsByClassName("data")[7].innerHTML = resultobj[0]["phone_number"];
            document.getElementById("mobile_phone_show").innerHTML = resultobj[0]["phone_number"];
            document.getElementById("message_phone").innerHTML = resultobj[0]["phone_number"];
            if(resultobj[0]["state"]==0){
                document.getElementsByClassName("data")[5].innerHTML = "novo (nekorisceno)";
            }
            else if(resultobj[0]["state"]==1){
                document.getElementsByClassName("data")[5].innerHTML = "polovno (korisceno)";
            }
            else{
                document.getElementsByClassName("data")[5].innerHTML = "nije navedeno stanje";
            }
            
            document.getElementById("description").innerHTML = resultobj[0]["description"];
            var opis = resultobj[0]["description"];
            if(opis.length > 150){
                var newopis = "";
                for(var i = 0; i < 150; i++)
                    newopis += opis[i];
                newopis += "...";
                document.getElementById("description_preview").innerHTML = newopis;
            }
            else
                document.getElementById("description_preview").innerHTML = resultobj[0]["description"];
            document.getElementsByClassName("data")[6].innerHTML = resultobj[0]["notes"];
            document.getElementById("notes_preview").innerHTML = resultobj[0]["notes"];
            document.getElementsByClassName("data")[4].innerHTML = resultobj[0]["price"];
            if(resultobj[0]["price"] != "-1")
                document.getElementById("price_preview").innerHTML = resultobj[0]["price"] + "€";
            else
                document.getElementById("price_preview").innerHTML = "Dogovor";
            document.getElementsByClassName("data")[9].innerHTML = resultobj[0]["creation_date"];
            document.getElementsByClassName("data")[8].innerHTML = resultobj[0]["location"];
            

            imagefolder = resultobj[0]["images"];
            brandsql = resultobj[0]["brand"];
            document.getElementById("brand_show").innerHTML = resultobj[0]["brand"];
            modelsql = resultobj[0]["model"];
            
            
            var xhr = new XMLHttpRequest();
            console.log(imagefolder);
            xhr.open("GET", "/Mobile-Phones-Store/Mobile-Phones-Store/functionality/"+imagefolder, true);
            xhr.responseType = 'document';
            xhr.onload = () => {
                if (xhr.status === 200) {
                    var elements = xhr.response.getElementsByTagName("a");
                    console.log(elements.length);
                    for (x of elements) {
                        if ( x.href.match(/\.(jpe?g|png|gif)$/) ) { 
                            let img = document.createElement("img");
                            img.src = x.href;
                            img.classList.add("images_other");
                            img.id = br3++;
                            img.onclick = function(){
                                document.getElementById("zoomC").style.backgroundImage = "url('" +img.src+"')";
                                document.getElementById("zoomC1").style.backgroundImage = "url('" +img.src+"')";
                                img.classList.add("images_other_click");
                                img_index = img.id;
                            };
                            
                            document.getElementById("img-div").appendChild(img);
                        } 
                    };
                } 
                else {
                    document.getElementById("img-div").style.display = "none";
                    console.log('Request failed. Returned status of ' + xhr.status);
                }
            }
            xhr.send()

            
            var file_name = "../";

            switch(brandsql){
                case "Apple":
                    file_name += "apple.csv";
                    break;
                case "Samsung":
                    file_name += "samsung.csv";
                    break;
                case "Asus":
                    file_name += "asus.csv";
                    break;
                case "Huawei":
                    file_name += "huawei.csv";
                    break;
                case "Alcatel":
                    file_name += "alcatel.csv";
                    break;
            }
            

            var tabela = document.getElementById("specs-table");
            Papa.parse(file_name, {
                download: true,
                complete: function(results) {
                    for(var i = 0; i < results.data.length; i++){
                        if(results.data[i][0] == brandsql && results.data[i][1] == modelsql){
                            Papa.parse('../headers.csv', {
                                download: true,
                                complete: function(results2) {
                                    for(var j = 0; j < results2.data[0].length; j++){
                                        if(results.data[i][j] != ''){
                                            var tr = document.createElement('tr');
                                            var th = document.createElement('th');
                                            th.classList.add("prva_kolona");
                                            var text = document.createTextNode(results2.data[0][j]);
                                            th.appendChild(text);
                                            tr.appendChild(th);
                    
                                    
                                            var th2 = document.createElement('th');
                                            th2.classList.add("druga_kolona");
                                            if(results.data[i][j] != '') var text2 = document.createTextNode(results.data[i][j]);
                                            
                                            th2.appendChild(text2);
                                            tr.appendChild(th2);
                    
                                            tabela.appendChild(tr);
                                        }
                                    }
                                    $.ajax({
                                        type: "POST",
                                        url: "nameuserid.php",
                                        data: {id: oglas_id},
                                        success: function(response){
                                            resultobj = JSON.parse(response);
                                            var ad_creator_id = resultobj[0]["id"];
                                            setCookie("ad_creator_id", ad_creator_id, 1);
                                            document.getElementsByClassName("data")[0].innerHTML = resultobj[0]["name"] + " " + resultobj[0]["surname"] ;
                                            document.getElementById("customer_show").innerHTML = resultobj[0]["name"] + " " + resultobj[0]["surname"];
                                            document.getElementById("message_name").innerHTML = resultobj[0]["name"] + " " + resultobj[0]["surname"];
                                        }
                                    });
                                }
                            });
                            break;
                        }
                        else
                            x = -1;
                    }
                }
            });
        }
    });

    addZoom("zoomC");
    


    //TRI NAJNOVIJA OGLASA

    $.ajax({
        type: "POST",
        url: "get_last_three.php",
        success: function(response){
            resultobj = JSON.parse(response);
            for(var i = 0; i < resultobj.length; i++){
                var lokacija = "main_images/" + resultobj[i]["brand"] + " " + resultobj[i]["model"] + ".jpg";
                
                var main_div = document.getElementById("newest_ads");
                    var ads_main_container = document.createElement("div");
                    ads_main_container.classList.add("newest_ads_main_container");
                        var ads_image_container = document.createElement("div");
                        ads_image_container.style.backgroundImage = "url('"+lokacija+"')";
                        ads_image_container.classList.add("newest_ads_image_container");
                        
                        ads_main_container.appendChild(ads_image_container);
                        
                        var ads_information_container = document.createElement("div");
                        ads_information_container.classList.add("newest_ads_info_container");
                            var ads_title_container = document.createElement("div");
                            ads_title_container.classList.add("newest_ads_title_container");
                                var ads_title = document.createElement("p");
                                ads_title.innerHTML = resultobj[i]["title"];
                                ads_title_container.appendChild(ads_title);
                            ads_information_container.appendChild(ads_title_container);
                            var ads_price_container = document.createElement("div");
                            ads_price_container.classList.add("newest_ads_price_container");
                                var ads_price = document.createElement("p");
                                if(resultobj[i]["price"] != "-1")
                                    ads_price.innerHTML = resultobj[i]["price"] + "€";
                                else
                                    ads_price.innerHTML = "Dogovor";
                                ads_price_container.appendChild(ads_price);
                            ads_information_container.appendChild(ads_price_container);
                        ads_main_container.appendChild(ads_information_container);
                        
                        var clickable_div = document.createElement("div");
                        clickable_div.classList.add("clickable_div");
                        ads_main_container.appendChild(clickable_div);
                    main_div.appendChild(ads_main_container);
                    if(i != 2){
                        var linija = document.createElement("hr");
                        main_div.appendChild(linija);
                    }
            }

            /*document.getElementById("zoomC").style.backgroundImage = "url('"+lokacija+"')";
            document.getElementById("price_preview").innerHTML = resultobj[0]["price"] + "€";
            document.getElementById("title").innerHTML = resultobj[0]["title"];*/
        }
    });


    //Favorite Dugme Prikaz

    var value = $_GET('id');
    $.ajax({
        type: "POST",
        url: "add_to_favorite.php",
        data:{
            id: value,
            action: "0"
        },
        success: function(response){
            if(response == "6"){
                document.getElementById("add_to_favorite").style.backgroundColor = "#ff006a";
                document.getElementById("add_to_favorite").style.color = "white";
            }
        }
    });

    //Profilna slika prikaz

    $.ajax({
        type: "POST",
        url: "check_login_status.php",
        success: function(response){
            if(response == "2" || response == "3"){
                document.getElementById("login_button").addEventListener("click", show_login_large_devices());
            }
            else{
                document.getElementById("login_button").src = "data:image;base64,"+response;
                document.getElementById("login_button").style.borderRadius = "10px";
                document.getElementById("login_button").style.width = "25px";
                document.getElementById("login_button").style.height = "25px";
                document.getElementById("login_button").style.objectFit = "contain";
                document.getElementById("login_button").style.border = "1px solid black";
                document.getElementById("login_button").addEventListener("click", function(){
                    alert("Hello");
                })
            }
        }
    });
}

function show_description(){
    var div = document.getElementById("description-div");
    var div1 = document.getElementById("specs-div");
        
    div1.style.display = "none";
    div.style.display = "block";
}

function show_specs(){
    var div = document.getElementById("description-div");
    var div1 = document.getElementById("specs-div");

    div.style.display = "none";
    div1.style.display = "block";
}


var addZoom = (target) => {
    let container = document.getElementById(target),
        imgsrc = container.currentStyle || window.getComputedStyle(container, false);
        imgsrc = imgsrc.backgroundImage.slice(4, -1).replace(/"/g, "");
    
    let img = new Image();
    img.src = imgsrc;
    img.onload = () => {
      let ratio = img.naturalHeight / img.naturalWidth;
   
      container.onmousemove = (e) => {
        let rect = e.target.getBoundingClientRect(),
            xPos = e.clientX - rect.left,
            yPos = e.clientY - rect.top,
            xPercent = xPos / (container.clientWidth / 100) + "%",
            yPercent = yPos / ((container.clientWidth * ratio) / 100) + "%";
   
        Object.assign(container.style, {
          backgroundPosition: xPercent + " " + yPercent,
          backgroundSize: img.naturalWidth + "px"
        });
      };
      
      container.onmouseleave = (e) => {
        Object.assign(container.style, {
          backgroundPosition: "center",
          backgroundSize: "contain"
        });
      };
    }
  };
   

 function next_img(){
     if(img_index == br3 -1 ){
         img_index = 0;
     }
     else{
         img_index++;
     }
    let img = document.getElementsByClassName("images")[img_index]; 
    document.getElementById("zoomC").style.backgroundImage = "url('" +img.src+"')";
    
 }

 function prev_img(){
    if(img_index == 0 ){
        img_index = br3 -1 ;
    }
    else{
        img_index--;
    }
    let img = document.getElementsByClassName("images")[img_index]; 
    document.getElementById("zoomC").style.backgroundImage = "url('" +img.src+"')";
 }

 function next_img1(){
    if(img_index == br3 -1 ){
        img_index = 0;
    }
    else{
        img_index++;
    }
   let img = document.getElementsByClassName("images")[img_index]; 
   document.getElementById("zoomC1").style.backgroundImage = "url('" +img.src+"')";
   
}

function prev_img1(){
   if(img_index == 0 ){
       img_index = br3 -1 ;
   }
   else{
       img_index--;
   }
   let img = document.getElementsByClassName("images")[img_index]; 
   document.getElementById("zoomC1").style.backgroundImage = "url('" +img.src+"')";
}


 function open_img(){
    var div = document.getElementsByClassName("open-img-div")[0];
    div.style.display = "block";
 }

 function close_img(){
    var div = document.getElementsByClassName("open-img-div")[0];
    div.style.display = "none";
 }

 function show_specifications(x){
    document.getElementById("3d_model_preview").style.display = "none";
    document.getElementById("description_main").style.display = "none";
    document.getElementById("specifications_main").style.display = "block";
    document.getElementsByClassName("additional_information")[0].style.borderBottom = "3px solid transparent";
    document.getElementsByClassName("additional_information")[2].style.borderBottom = "3px solid transparent";
    document.getElementsByClassName("additional_information")[1].style.borderBottom = "3px solid #ff006a";
 }

 function show_description(){
    document.getElementById("3d_model_preview").style.display = "none";
    document.getElementById("description_main").style.display = "block";
    document.getElementById("specifications_main").style.display = "none";
    document.getElementsByClassName("additional_information")[1].style.borderBottom = "3px solid transparent";
    document.getElementsByClassName("additional_information")[2].style.borderBottom = "3px solid transparent";
    document.getElementsByClassName("additional_information")[0].style.borderBottom = "3px solid #ff006a";
 }

 function show_3d_model(){
    document.getElementById("3d_model_preview").style.display = "block";
    document.getElementById("description_main").style.display = "none";
    document.getElementById("specifications_main").style.display = "none";
    document.getElementsByClassName("additional_information")[1].style.borderBottom = "3px solid transparent";
    document.getElementsByClassName("additional_information")[0].style.borderBottom = "3px solid transparent";
    document.getElementsByClassName("additional_information")[2].style.borderBottom = "3px solid #ff006a";
 }
function $_GET(q,s) {
    s = (s) ? s : window.location.search;
    var re = new RegExp('&amp;'+q+'=([^&amp;]*)','i');
    return (s=s.replace(/^\?/,'&amp;').match(re)) ?s=s[1] :s='';
}
 function add_to_favorite(){
    var value = $_GET('id');
    $.ajax({
        type: "POST",
        url: "add_to_favorite.php",
        data:{
            id: value,
            action: "1"
        },
        success: function(response){
            switch(response){
                case "1":
                    document.getElementById("add_to_favorite").style.backgroundColor = "#ff006a";
                    document.getElementById("add_to_favorite").style.color = "white";
                    break;
                case "2": case "3": case "4":
                    alert("Doslo je do greske. Molimo pokusajte kasnije!");
                    break;
                case "5":
                    document.getElementById("add_to_favorite").style.backgroundColor = "lightgrey";
                    document.getElementById("add_to_favorite").style.color = "black";
                    break;
            }
        }
    });
 }

 function quick_add_to_favorite(){
    var value = $_GET('id');
    $.ajax({
        type: "POST",
        url: "functionality/add_to_favorite.php",
        data:{
            id: value,
            action: "1"
        },
        success: function(response){
            switch(response){
                case "1":
                    document.getElementById("add_to_favorite").style.backgroundColor = "#ff006a";
                    document.getElementById("add_to_favorite").style.color = "white";
                    break;
                case "2": case "3": case "4":
                    alert("Doslo je do greske. Molimo pokusajte kasnije!");
                    break;
                case "5":
                    document.getElementById("add_to_favorite").style.backgroundColor = "lightgrey";
                    document.getElementById("add_to_favorite").style.color = "black";
                    break;
            }
        }
    });
 }

 var brand_selected = "";
 var model_selected = "";
 var max_price = 0;

 const model_selected_array = [];

 function selectedBrand(x){
    model_selected = "";
    brand_selected = x.value;
    var el = document.getElementById("main_selected_models");
    while (el.firstChild) {
        el.removeChild(el.lastChild);
    }
    var brand = x.value + "_models";
    var niz = window[brand];
    for(var i = 0; i < niz.length; i++){
        var labela = document.createElement("label");
        labela.classList.add("container");
        labela.innerHTML = niz[i];
            var inp = document.createElement("input");
            inp.type = "checkbox";
            inp.value = niz[i];
            inp.addEventListener("change", function(){
                model_selected_array.push(this.value);
            });
            labela.appendChild(inp);

            var spn = document.createElement("span");
            spn.classList.add("checkmark");
            labela.appendChild(spn);
        el.appendChild(labela);
    }
 }
function pricerange(x){
    document.getElementById("range_price").innerHTML = x.value;
    max_price = x.value;
}

function filtriraj(){
    var models = JSON.stringify(model_selected_array);
    var novo = document.getElementById("novo");
    var polovno = document.getElementById("polovno");
    var stanje = "";

    if(novo.checked && polovno.checked)
        stanje = "10";
    else if(novo.checked)
        stanje = "0";
    else if(polovno.checked)
        stanje = "1";
    else 
        stanje = "10";
    
    var main_div = document.getElementById('ads_preview_main');
    while (main_div.firstChild) {
        main_div.removeChild(main_div.lastChild);
    }
    $.ajax({
        type: "POST",
        url: "functionality/filter_data.php",
        data:{
            brand: brand_selected,
            model: models,
            maxprice: max_price,
            state: stanje
        },
        caches: false,
        success:function(response){
            console.log(response);
            try{
                resultobj = JSON.parse(response);
                document.getElementById("founded_ads").innerHTML = resultobj.length;
                for(var i = 0; i < resultobj.length; i++){
                    var div_el = document.createElement('div');
                    div_el.classList.add("d-inline-block");
                    div_el.classList.add("col-4");
                    div_el.classList.add("ads_preview");
                    var div_el2 = document.createElement('div');
                    div_el2.classList.add("ads_preview_image_container");
                    var img_el = document.createElement("img");
                    var img_src = "functionality/main_images/" + resultobj[i]["brand"] + " " + resultobj[i]["model"] + ".jpg";
                    img_el.src = img_src;
                    img_el.classList.add("ads_preview_image");
                    div_el2.appendChild(img_el);
                    div_el.appendChild(div_el2);

                    var div_el3 = document.createElement('div');
                    div_el3.classList.add('ads_preview_info_container');
                    var p_el = document.createElement('p');
                    p_el.innerHTML = resultobj[i]["category"];
                    var h5_el = document.createElement('h5');
                    var title = "";
                    var ttl = resultobj[i]['title'];
                    for(var j = 0; j < 35 && ttl.length > 35; j++)
                        title += ttl[j];
                    title += "...";
                    if(title != "...")
                        h5_el.innerHTML = title;
                    else
                        h5_el.innerHTML = ttl;
                    var p_el3 = document.createElement('p');
                    if(resultobj[i]["state"] == 1)
                        p_el3.innerHTML = 'Polovno';
                    else
                        p_el3.innerHTML = "Novo";
                    var p_el2 = document.createElement('p');
                    if(resultobj[i]['price'] == -1)
                        p_el2.innerHTML = "Dogovor";
                    else
                        p_el2.innerHTML = resultobj[i]['price'] + "€";
                    p_el2.classList.add("price_show");

                    var following = document.createElement("div");
                    following.classList.add("following_div");
                    var elsrce = document.createElement("p");
                    elsrce.innerHTML = "❤ ";
                    var spanel = document.createElement("span");

                    spanel.innerHTML = resultobj[i]["favorites_count"];

                    elsrce.appendChild(spanel);
                    elsrce.style.color = "#ed0b69";
                    elsrce.style.fontSize = "14px";
                    elsrce.style.float = "right";
                    following.appendChild(elsrce);
                    
                    div_el3.appendChild(p_el);
                    div_el3.appendChild(h5_el);
                    div_el3.appendChild(p_el3);
                    div_el3.appendChild(p_el2);
                    div_el3.appendChild(following);

                    div_el.appendChild(div_el3);

                    var click_div = document.createElement('div');
                    click_div.classList.add("onclick_ads");

                    var precicediv = document.createElement("div");
                    precicediv.classList.add("poravnato_desno");

                    var srcediv = document.createElement("div");
                    srcediv.classList.add("precice_bg");
                    var srce = document.createElement("img");
                    srce.src = "images/heart.png";
                    srcediv.title = "Dodaj u omiljenje";
                    srcediv.appendChild(srce);
                    precicediv.appendChild(srcediv);

                    srcediv = document.createElement("div");
                    srcediv.classList.add("precice_bg");
                    srcediv.addEventListener("click", function(){
                        alert("Click");
                    });
                    srcediv.style.zIndex = "2";
                    srce = document.createElement("img");
                    srce.src = "images/extend.png";
                    srcediv.title = "Brzi prikaz";
                    srcediv.appendChild(srce);
                    precicediv.appendChild(srcediv);

                    click_div.appendChild(precicediv);

                    click_div.id = resultobj[i]["id"];
                    click_div.addEventListener("click", function(){
                        location.href = "functionality/add-view.php?id=" + this.id;
                    });

                    div_el.appendChild(click_div);
                    main_div.appendChild(div_el);

                    window.scrollTo(0, 300);
                }
            }
            catch(e){
                document.getElementById("founded_ads").innerHTML = "0";
            }
        }
    });
 }

 function add_to_favorite_quick(x){
    var value = document.getElementsByClassName("precice_bg")[0];
    alert(value.id);
    /*$.ajax({
        type: "POST",
        url: "add_to_favorite.php",
        data:{
            id: value,
            action: "0"
        },
        success: function(response){
            if(response == "6"){
                document.getElementById("add_to_favorite2").style.backgroundColor = "#ff006a";
                document.getElementById("add_to_favorite2").style.color = "white";
            }
        }
    });*/
 }

function send_message(){
    document.getElementsByClassName('dark_backgroundd')[0].style.display = "block";
    document.getElementsByClassName('send_message_container')[0].style.display = "block";
}
function close_message_container(){
    document.getElementsByClassName('dark_backgroundd')[0].style.display = "none";
    document.getElementsByClassName('send_message_container')[0].style.display = "none";
}
function send_first_message(){
    var message = document.getElementById("message_value").value;
    if(message != ""){
        $.ajax({
            type: "POST",
            url: "insert_message.php",
            data:{
                creator_id: getCookie("ad_creator_id"),
                message_value: message,
                ad_id: getCookie("ad_id"),
            },
            success: function(response){
                alert(response);
            }
        });
    }
    else
        alert("Morate uneti poruku");
}

function loadmessages(x){
	var wsUri = "ws://192.168.110.1:10000/functionality/LiveChat/server.php"; 	
	websocket = new WebSocket(wsUri); 
	
	websocket.onopen = function(ev) {
		console.log("Connected");
	}
	websocket.onmessage = function(ev) {
		var response 		= JSON.parse(ev.data);
		
		var res_type 		= response.type;
		var user_message 	= response.message;
		var user_name 		= response.name;
		var ad_id 		    = response.ad_id;
        var guess_name      = response.guess;

        var maindiv = document.getElementById("messages_div");
		switch(res_type){
			case 'usermsg': 
                if(guess_name == getCookie("user_id")){
                    var div1 = document.createElement("div");
                    div1.classList.add("gost_message");
                    div1.innerHTML = user_message;
                    //div1.title = resultobj[i]["dateandtime"];
                    var br1 = document.createElement("br");
                    maindiv.appendChild(div1);
                    maindiv.appendChild(br1);
                }
                else if(user_name == getCookie("user_id")){
                    var div1 = document.createElement("div");
                    div1.classList.add("host_message");
                    div1.innerHTML = user_message;
                    //div1.title = resultobj[i]["dateandtime"];
                    var br1 = document.createElement("br");
                    maindiv.appendChild(div1);
                    maindiv.appendChild(br1);
                }
				break;
			case 'system':
                console.log(user_message);
				break;
		}

	};
	
	websocket.onerror	= function(ev){ alert('Error Occurred - ' + ev.data); }; 
	websocket.onclose 	= function(ev){ alert('Connection Closed'); }; 

	$( "#messagevalue" ).on( "keydown", function( event ) {
	  if(event.which==13){
		  send_message();
	  }
	});
    var objDiv = document.getElementById("messages_div");
    objDiv.scrollTop = objDiv.scrollHeight;
    $.ajax({
        type: "POST",
        url: "loadmessages.php",
        success: function(response){
            resultobj = JSON.parse(response);
            for(var i = 0; i < resultobj.length; i++){
                var main_div = document.createElement("div");
                main_div.id = resultobj[i]["id"];
                main_div.classList.add("message_container");
                    var div1 = document.createElement("div");
                    div1.classList.add("col-3");
                    div1.classList.add("h-100");
                    div1.classList.add("message_profile_container");
                        var img1 = document.createElement("img");
                        img1.src = "../images/profile_image.png";
                        div1.appendChild(img1);
                    var div2 = document.createElement("div");
                    div2.classList.add("col-9");
                    div2.classList.add("message_info_container");
                        var div3 = document.createElement("div");
                        div3.classList.add("w-100");
                            var elh1 = document.createElement("h5");
                            elh1.style.color = "black";
                            elh1.style.fontWeight = "bold";
                            elh1.innerHTML = (resultobj[i]["name"] + " " + resultobj[i]["surname"]);
                            div3.appendChild(elh1);
                        var div4 = document.createElement("div");
                        div4.classList.add("w-100");
                        div4.style.maxHeight = "50px";
                        div4.style.overflow = "hidden";
                        div4.style.color = "grey";
                        div4.innerHTML = ("(" + resultobj[i]["title"] + ")");
                        div2.appendChild(div3);
                        div2.appendChild(div4);
                    main_div.appendChild(div1);
                    main_div.appendChild(div2);
                main_div.addEventListener("click", function(){
                    show_messages(this.id);
                });
                document.getElementById("messages_preview").appendChild(main_div);
            }
        }
    });

    var main_div = document.getElementById("messages_preview1");
    while (main_div.firstChild) {
        main_div.removeChild(main_div.lastChild);
    }
    $.ajax({
        type: "POST",
        url: "loadmessages2.php",
        success: function(response){
            resultobj = JSON.parse(response);
            for(var i = 0; i < resultobj.length; i++){
                var main_div = document.createElement("div");
                main_div.id = resultobj[i]["ad_id"];
                main_div.classList.add("message_container");
                    var div1 = document.createElement("div");
                    div1.classList.add("col-3");
                    div1.classList.add("h-100");
                    div1.classList.add("message_profile_container");
                        var img1 = document.createElement("img");
                        img1.src = "../images/profile_image.png";
                        div1.appendChild(img1);
                    var div2 = document.createElement("div");
                    div2.classList.add("col-9");
                    div2.classList.add("message_info_container");
                        var div3 = document.createElement("div");
                        div3.classList.add("w-100");
                            var elh1 = document.createElement("h5");
                            elh1.style.color = "black";
                            elh1.style.fontWeight = "bold";
                            elh1.innerHTML = (resultobj[i]["name"] + " " + resultobj[i]["surname"]);
                            div3.appendChild(elh1);
                        var div4 = document.createElement("div");
                        div4.classList.add("w-100");
                        div4.style.maxHeight = "50px";
                        div4.style.overflow = "hidden";
                        div4.style.color = "grey";
                        div4.innerHTML = ("(" + resultobj[i]["ad_title"] + ")");
                        div2.appendChild(div3);
                        div2.appendChild(div4);
                    main_div.appendChild(div1);
                    main_div.appendChild(div2);
                main_div.addEventListener("click", function(){
                    show_messages2(this.id);
                });
                
                document.getElementById("messages_preview1").appendChild(main_div);
            }
        }
    });
}
var guessid = 0, adid = 0;
function show_messages(x){
    $.ajax({
        type: "POST",
        url: "loadmessages.php",
        success: function(response){
            resultobj = JSON.parse(response);
            for(var i = 0; i < resultobj.length; i++){
                if(resultobj[i]["id"] == x){
                    var guess_id = resultobj[i]["usrid"];
                    var div1 = document.createElement("div");
                    div1.classList.add("col-7");
                    div1.classList.add("h-100");
                    div1.classList.add("row");
                        var div2 = document.createElement("div");
                        div2.classList.add("d-inline-block");
                        div2.classList.add("col-3");
                        div2.classList.add("h-100");
                            var img1 = document.createElement("img");
                            img1.src = "../images/profile_image.png";
                            img1.classList.add("profile_image_message");
                            div2.appendChild(img1);
                        var div3 = document.createElement("div");
                        div3.classList.add("d-inline-block");
                        var h31 = document.createElement("h3");
                        h31.innerHTML = (resultobj[i]["name"] + " " + resultobj[i]["surname"]);
                        div3.appendChild(h31);

                    var div4 = document.createElement("div");
                    div4.classList.add("col-5");
                        var a1 = document.createElement("a");
                        a1.style.color = "#ed0b69";
                        var p1 = document.createElement("p");
                        p1.classList.add("ads_title_message");
                        p1.innerHTML = resultobj[i]["title"];
                        a1.appendChild(p1);
                        div4.appendChild(a1);
                    div1.appendChild(div2);
                    div1.appendChild(div3);
                    var main_div = document.getElementsByClassName("name_message_container")[0];
                    while (main_div.firstChild) {
                        main_div.removeChild(main_div.lastChild);
                    }
                    main_div.appendChild(div1);
                    main_div.appendChild(div4);
                    guessid = guess_id;
                    adid = x;
                    
                    show_messages_content(x, guess_id, 1);
                }
            }
        }
    });

}

function show_messages_content(adid, gid, act){
    var maindiv = document.getElementById("messages_div");
    while (maindiv.firstChild)
        maindiv.removeChild(maindiv.lastChild);
    $.ajax({
        type: "POST",
        url: "loadmessagescontent.php",
        data:{
            ad_id: adid,
            guess_id: gid,
            action: act
        },
        success: function(response){
            console.log(response);
            resultobj = JSON.parse(response);
            for(var i = 0; i < resultobj.length; i++){
                if(resultobj[i]["from_id"] == gid){
                    var div1 = document.createElement("div");
                    div1.classList.add("gost_message");
                    div1.innerHTML = resultobj[i]["message"];
                    div1.title = resultobj[i]["dateandtime"];
                    var br1 = document.createElement("br");
                    maindiv.appendChild(div1);
                    maindiv.appendChild(br1);
                }
                else{
                    var div1 = document.createElement("div");
                    div1.classList.add("host_message");
                    div1.innerHTML = resultobj[i]["message"];
                    div1.title = resultobj[i]["dateandtime"];
                    var br1 = document.createElement("br");
                    maindiv.appendChild(div1);
                    maindiv.appendChild(br1);
                }
            }
        }
    });
}

function send_message(){
    var message_input = document.getElementById("messagevalue"); 
    var name_input = getCookie("user_id");

    if(message_input.value == ""){
        alert("Enter Some message Please!");
        return;
    }
    var msg = {
        message: message_input.value,
        name: name_input,
        ad_id: adid,
        guess: guessid
    };
    websocket.send(JSON.stringify(msg));
    
    $.ajax({
        type: "POST",
        url: "insertmessage.php",
        data:{
            id: getCookie("user_id"),
            ad_id: adid,
            guess_id: guessid,
            message: message_input.value
        },
        success: function(response){
            if(response != 1)
                alert("Greska");
        }
    });
    	
    message_input.value = "";
}

function message_action(x){
    var btn1 = document.getElementById("kontaktirao");
    var btn2 = document.getElementById("kontaktirali");
    var msg1 = document.getElementById("messages_preview");
    var msg2 = document.getElementById("messages_preview1");
    switch(x){
        case 1:
            btn1.style.backgroundColor = "#ed0b69";
            btn1.style.color = "white";
            btn2.style.backgroundColor = "white";
            btn2.style.color = "#ed0b69";
            msg1.style.display = "block";
            msg2.style.display = "none";
            break;
        case 2:
            btn1.style.backgroundColor = "white";
            btn1.style.color = "#ed0b69";
            btn2.style.backgroundColor = "#ed0b69";
            btn2.style.color = "white";
            msg1.style.display = "none";
            msg2.style.display = "block";
            break;
    }
}

guessid = 0, adid = 0;
function show_messages2(x){
    $.ajax({
        type: "POST",
        url: "loadmessages2.php",
        success: function(response){
            resultobj = JSON.parse(response);
            console.log(resultobj);
            for(var i = 0; i < resultobj.length; i++){
                if(resultobj[i]["ad_id"] == x){
                    var guess_id = resultobj[i]["from_id"];
                    var div1 = document.createElement("div");
                    div1.classList.add("col-7");
                    div1.classList.add("h-100");
                    div1.classList.add("row");
                        var div2 = document.createElement("div");
                        div2.classList.add("d-inline-block");
                        div2.classList.add("col-3");
                        div2.classList.add("h-100");
                            var img1 = document.createElement("img");
                            img1.src = "../images/profile_image.png";
                            img1.classList.add("profile_image_message");
                            div2.appendChild(img1);
                        var div3 = document.createElement("div");
                        div3.classList.add("d-inline-block");
                        var h31 = document.createElement("h3");
                        h31.innerHTML = (resultobj[i]["name"] + " " + resultobj[i]["surname"]);
                        div3.appendChild(h31);

                    var div4 = document.createElement("div");
                    div4.classList.add("col-5");
                        var a1 = document.createElement("a");
                        a1.style.color = "#ed0b69";
                        var p1 = document.createElement("p");
                        p1.classList.add("ads_title_message");
                        p1.innerHTML = resultobj[i]["ad_title"];
                        a1.appendChild(p1);
                        div4.appendChild(a1);
                    div1.appendChild(div2);
                    div1.appendChild(div3);
                    var main_div = document.getElementsByClassName("name_message_container")[0];
                    while (main_div.firstChild) {
                        main_div.removeChild(main_div.lastChild);
                    }
                    main_div.appendChild(div1);
                    main_div.appendChild(div4);
                    guessid = guess_id;
                    adid = x;
                    
                    show_messages_content(x, guess_id, 0);
                }
            }
        }
    });

}