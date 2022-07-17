<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="javascript/main.js?v=<?php echo time(); ?>"></script>
    <title>MobileShop</title>
    <link rel="icon" type="image/x-icon" href="images/logo2.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300&display=swap" rel="stylesheet">
</head>
<body onload="index_onload()">
    <!-- Navigation Bar -->
    <div style="width: 100%">
        <div class="w-100 col-xl-12 col-lg-12 col-md-12 d-xl-inline-block d-lg-inline-block d-md-inline-block d-sm-none d-none" style="height: 35px; background-color: #262626;">

        </div>
        <div class="w-100 row p-2" style="height: 40%; border-bottom: 1px solid lightgrey">
            <div class="col-xl-1 col-lg-1 d-xl-inline-block d-lg-inline-block d-md-none d-sm-none d-none"></div>
            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 d-xl-inline-block d-lg-inline_block d-md-inline-block d-sm-none d-none pl-xl-3 pl-lg-3 pl-md-4 pl-sm-4 pl-4">
                <h1 class="box w-100 text-xl-left text-lg-left text-md-left text-sm-center text-center">LOGO</h1>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-4 d-xl-inline-block d-lg-inline-block d-md-inline-block d-sm-none d-none h-100 bg-color">
                <div class="w-100 box">
                    <p class="mb-0 ml-3" style="font-weight: bold;">Send us a message</p>
                    <a class="mt-0 text-decoration-none ml-3 contact_us_email"><u>teamflaminqo@gmail.com</u></a>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-4 d-xl-inline-block d-lg-inline-block d-md-inline-block d-sm-none d-none h-100 text-xl-left text-lg-left text-md-right">
                <div class="w-100 box">
                    <p class="mb-0 ml-3" style="font-weight: bold;">Need help? Call us:</p>
                    <a class="mt-0 text-decoration-none ml-3 contact_us_email"><u>+381 3796520</u></a>
                </div>
            </div>
            <div class="pt-3 pb-0 pr-0 pl-0 col-xl-2 col-lg-2 d-xl-inline-block d-lg-inline-block d-md-none d-sm-none d-none" >
                <div style="width: 120px; display: block; float:right;">
                    <img src="images/user.png" id="login_button" style="width: 22px" class="user_heart_bag" alt="">
                    <img src="images/heart.png" style="margin-top: 5px;" class="user_heart_bag" alt="" onclick="show_bag_preview_container1()">
                    <img src="images/bagg.png" style="width: 25px" class="user_heart_bag" alt="" onclick="window.location = 'functionality/messages.php'">
                </div>
                <div class="login_large_device">
                    <div class="main_login_large_container">
                        <div style="height: 30px;">
                            <h4 style="float: left;">Sign in</h4>
                            <p class="create_an_account" onclick="window.location.href = 'create-account.php'">Create an Account.</p>
                        </div>
                        <div>
                            <p style="margin-top: 30px; color: grey; margin-bottom: 5px;">Username or email<span style="color:red">*</span></p>
                            <input id="email_login" type="text" class="col-md-12 col-12 sign_up_form_input" placeholder="Username" onchange="change_login_large()">
                            <p class="notification_error_message" id="email_validation_login">Nepodrzan email</p>
                            <p style="margin-top: 15px; color: grey; margin-bottom: 5px;">Password <span style="color:red">*</span></p>
                            <input id="password_login" type="password" class="col-md-12 col-12 sign_up_form_input" placeholder="Password" onchange="change_login_large()">
                            <p class="notification_error_message" id="password_validation_login">Nepodrzan email</p>
                            <button class="login_large_button" onclick="login_large()">LOGIN</button>
                            <p class="login_large_lost_password">Lost your password?</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="w-100 row" style="height:35%;">
            <div class="col-xl-1 col-lg-1 d-xl-inline-block d-lg-inline-block d-md-none d-sm-none h-100 d-inline-block"></div>
            <div class="col-xl-3 col-lg-3 col-md-3 d-xl-inline-block d-lg-inline-block d-md-none d-sm-none d-none">
                <button class="mt-3 mb-3 p-3 w-100 dropdown_button">shop by categories</button>
            </div>
            <div class="col-xl-5 col-lg-5 d-xl-inline-block d-lg-inline-block d-md-none d-sm-none d-none">
                <ul class="p-4">
                    <li><a class="mr-2" href="#">Home</a></li>
                    <li><a class="mr-2" href="#">shop</a></li>
                    <li><a class="mr-2" href="#">blog</a></li>
                    <li><a class="mr-2" href="#">info</a></li>
                    <li><a href="#">contact</a></li>
                </ul>
            </div>
            <div class="col-xl-2 col-lg-2 d-xl-inline-block d-lg-inline-block d-md-none d-smnone d-none">
                <input type="text" class="w-100 search_input" placeholder="Search products...">
            </div>
        </div>
        <div class="w-100 row  p-md-2 p-sm-3 p-3 d-xl-none d-lg-none">
            <div class="col-md-6 col-sm-3 col-3">
                <img src="images/menu.png" class="pl-3 menu_bag" alt="" onclick="show_tablet_menu()">
            </div>
            <div class="col-sm-6 col-6 d-xl-none d-lg-none d-md-none d-sm-inline-block d-inline-block">
                <h2 class="text-center">MOBILESHOP</h2>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-3 col-3">
                <img src="images/bag.png" style="float: right" class="pl-3 menu_bag" alt="" onclick="show_bag_preview_container()">
            </div>
        </div>
    </div>
    <div class="w-100" style="background-color: rgb(241, 243, 248)">
        <div class="w-100 row">
            <div class="col-xl-1 col-lg-1 d-xl-inline-block d-lg-inline-block d-md-none d-sm-none h-100 d-inline-block bg-dark"></div>
            <div class="col-xl-3 col-lg-3 col-md-3 d-xl-inline-block d-lg-inline-block d-md-none d-sm-none d-none">
                <h1 class="mt-3 mb-3 w-100">Sop</h1>
            </div>
        </div>
        <div class="w-100 row">
            <div class="col-xl-1 col-lg-1 d-xl-inline-block d-lg-inline-block d-md-none d-sm-none h-100 d-inline-block"></div>
            <div class="col-xl-2 col-lg-2 col-md-2 d-xl-inline-block ml-3 mb-3 p-0 d-lg-inline-block">
                <div style="width: 100%;" class="brand_left">
                    <div style="width: 80%; display: block; margin: auto;">
                        <h5 style="font-weight: bold; margin-bottom: 20px; padding-top: 20px;">Brendovi</h5>
                        <label class="container">Alcatel
                            <input type="radio" name="brand" value="alcatel" onchange="selectedBrand(this)">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Alpha
                            <input type="radio" name="brand" value="alpha" onchange="selectedBrand(this)">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Apple
                            <input type="radio" name="brand" value="apple" onchange="selectedBrand(this)">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Asus
                            <input type="radio" name="brand" value="asus" onchange="selectedBrand(this)">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Blackberry
                            <input type="radio" name="brand" value="blackberry" onchange="selectedBrand(this)">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Goclever
                            <input type="radio" name="brand" value="goclever" onchange="selectedBrand(this)">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Google
                            <input type="radio" name="brand" value="google" onchange="selectedBrand(this)">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Honor
                            <input type="radio" name="brand" value="honor" onchange="selectedBrand(this)">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Huawei
                            <input type="radio" name="brand" value="huawei" onchange="selectedBrand(this)">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">HTC
                            <input type="radio" name="brand" value="htc" onchange="selectedBrand(this)">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">LG
                            <input type="radio" name="brand" value="lg" onchange="selectedBrand(this)">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Motorola
                            <input type="radio" name="brand" value="motorola" onchange="selectedBrand(this)">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Nokia
                            <input type="radio" name="brand" value="nokia" onchange="selectedBrand(this)">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">OnePlus
                            <input type="radio" name="brand" value="oneplus" onchange="selectedBrand(this)">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Oppo
                            <input type="radio" name="brand" value="oppo" onchange="selectedBrand(this)">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Poco
                            <input type="radio" name="brand" value="poco" onchange="selectedBrand(this)">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Realme
                            <input type="radio" name="brand" value="realme" onchange="selectedBrand(this)">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Samsung
                            <input type="radio" name="brand" value="Samsung" onchange="selectedBrand(this)">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Sony
                            <input type="radio" name="brand" value="sony" onchange="selectedBrand(this)">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Sony Ericsson
                            <input type="radio" name="brand" value="sonyericsson" onchange="selectedBrand(this)">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Xiaomi
                            <input type="radio" name="brand" value="xiaomi" onchange="selectedBrand(this)">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Other
                            <input type="radio" name="brand" value="other" onchange="selectedBrand(this)">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <div style="width: 100%;" class="brand_left">
                    <div style="width: 80%; display: block; margin: auto;" id="selected_models">
                        <h5 style="font-weight: bold; margin-bottom: 20px; padding-top: 20px;">Modeli</h5>
                        <div id="main_selected_models">
                            <p>Izaberite brend</p>
                        </div>
                    </div>
                </div>
                <div style="width: 100%;" class="brand_left">
                    <div style="width: 80%; margin: auto; display: block;" id="selected_price">
                        <h5 style="font-weight: bold; margin-bottom: 20px; padding-top: 20px;">Cena</h5>
                        <div class="slidecontainer" style="padding-bottom: 20px;">
                            <input type="range" min="1" max="2000" value="2000" class="slider" id="myRange" onmousemove="pricerange(this)">
                        </div>
                        
                        <p>Max: <span id="range_price">2000</span>€</p>
                        <label class="container">Prikazi uredjaje za koje nije navedena cena
                            <input type="checkbox" name="pozovi" value="pozovi">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <div style="width: 100%;" class="brand_left">
                    <div style="width: 80%; margin: auto; display: block;" id="selected_price">
                        <h5 style="font-weight: bold; margin-bottom: 20px; padding-top: 20px;">Stanje</h5>
                        <label class="container">Novo
                            <input type="checkbox" name="state" value="novo" id="novo">
                            <span class="checkmark"></span>
                        </label>
                        <label class="container">Polovno
                            <input type="checkbox" name="state" value="polovno" id="polovno">
                            <span class="checkmark"></span>
                        </label>
                    </div>
                </div>
                <div style="width: 100%;background-color: transparent;" class="brand_left">
                    <button class="search_filter_btn" onclick="filtriraj()">Pretrazi</button>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-8 d-xl-inline-block ml-3 mb-3 d-lg-inline-block">
                <div class="row">
                    <div class="w-100" style="height: 80px; background: white; border: 10px solid rgb(241, 243, 248); border-radius: 20px;">
                        <div class="w-100 h-100 row">
                            <div class="col-4"></div>
                            <div class="col-4"></div>
                            <div class="col-4">
                                <p style="text-align: right; position: relative; top: 50%; transform: translateY(-50%);">Pronadjeno <span style="font-weight: bold;" id="founded_ads">6</span> oglasa</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="ads_preview_main">
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Preview -->
    <div class="dark_backgroundd" onclick="close_quick_preview()"></div>
    <div class="quick_preview_main_div" style="display: none; border-radius: 10px;">
    <div class="w-100 pl-4 pr-4 pb-4 row">
        <p style="position: absolute; right: -40px; top: 0; cursor: pointer; font-size: 40px; font-weight: 20px; color: white;" onclick="close_quick_preview()">X</p>
        <div class="images-div col-6">
            <div class="margin-div" style="width: 100%; height: 400px; position: relative; top: 50%; transform: translateY(-50%);">
                <div id="zoomC" style="width: 100%; height: 100%;"></div>
                <div id="img-div" style="width: 100%; height: 100px; margin-top: 20px;"></div>
            </div>
        </div>
        <div class="col-6" style="height: 450px; overflow-y: auto;">
            <div class="w-100">
                <h3 style="font-weight: bold; margin-top: 20px;" id="title"></h3>
            </div>
            <div class="w-100">
                <h4 id="price_preview"></h4>
            </div>
            <div class="w-100 mt-4">
                <p id="description_preview"></p>
            </div>
            <hr>
            <div class="w-100">
                <button id="send_message_preview">Posalji poruku</button>
                <button id="add_to_favorite2" onclick="add_to_favorite_quick(this)">❤</button>
            </div>
            <hr>
            <div class="w-100 mt-4">
                <p style="color: grey">Kategorija: <span style="color: black" id="categories_preview"></span></p>
                <p style="color: grey">Napomene: <span style="color: black" id="notes_preview"></span></p>
            </div>
        </div>
    </div>
    </div>


    <!-- Prikaz Menu-a za tablete -->
    <div class="dark_background" onclick="close_tablet_menu()"></div>
    <div class="tablet_menu_container d-xl-none d-lg-none">
        <div class="main_tablet_menu_container">
            <div class="w-100 navigation_head_design">
                <p class="d-inline-block text_design" id="main_menu_design" onclick="main_menu_click_function()">Main menu</p>
                <p class="ml-4 text-center d-inline-block text_design" id="shop_by_categories_design" onclick="shop_by_categories_click_function()">Shop by categories</p>
                <p class="ml-4 text-center d-inline-block text_design" id="shop_by_categories_design" onclick="close_tablet_menu()">X</p>
            </div>
            <div class="navigation_item_design">
                <a href="#">Homepage</a>
                <a href="#" style="float: right; color: grey;">></a>
            </div>
            <div class="navigation_item_design">
                <a href="#">Shop</a>
                <a href="#" style="float: right; color: grey;">></a>
            </div>
            <div class="navigation_item_design">
                <a href="#">Blog</a>
                <a href="#" style="float: right; color: grey;">></a>
            </div>
            <div class="navigation_item_design">
                <a href="#">Info</a>
                <a href="#" style="float: right; color: grey;">></a>
            </div>
        </div>
        <div class="choose_language">
            <img src="images/serbia.png" alt="">
            <img src="images/england.png" alt="">
        </div>
    </div>

    <div class="responsive_background" onclick="close_login_large_device()"></div>
    <!-- Prikaz sadrzaja korpe -->
    <div class="bag_preview_container">
        <div class="main_bag_preview_container">
            <div class="header_bag_preview">
                <h5 style="font-weight: bold;">OMILJENI OGLASI</h5>
                <p onclick="close_bag_preview_container()" style="font-weight: bold;">X</p>
            </div>
            <p style="width:100%; text-align: center; margin-top: 20px; color: grey; display: none">Jos uvek nemate omiljene oglase.</p>
            <div class="main_bag_preview" id="favorite_ads_show" style="width: 100%; height: 500px; display: block; margin: auto; margin-top: 20px;">

            </div>
        </div>
    </div>

    <div class="row banner">
        <div class="col-xl-1 col-lg-1 h-100 d-xl-inline-block d-lg-inline-block d-md-none d-sm-none d-none"></div>
        <div class="col-xl-1 col-lg-1 col-md-2 col-sm-12 col-12 d-xl-inline-block d-lg-inline-block d-md-inline-block d-sm-inline-block d-inline-block">
            <img src="images/image.png" style="position: relative; left: 50%; top: 50%; transform: translate(-50%, -50%)" alt="">
        </div>
        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 d-xl-inline-block d-lg-inline-block d-md-inline-block d-sm-inline-block d-inline-block">
            <div style="position: relative; top: 50%; transform: translateY(-50%)">
                <h3 style="color: white" class="text-xl-left text-lg-left text-md-left text-sm-center text-center">Fear Of Missing Out?</h3>
                <p style="color: lightgrey;" class="text-xl-left text-lg-left text-md-left text-sm-center text-center">Get the latest deals, updates & more</p>
            </div>
        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 d-xl-inline-block d-lg-inline-block d-md-inline-block d-sm-inline-block d-inline-block">
            <input type="text" class="ml-xl-0 ml-lg-0 ml-md-1 ml-sm-2 ml-2 pl-10 pr-10 enter_email_receive d-inline-block" placeholder="Your email address">
            <button class="button_email_receive">Subscribe</button>
        </div>
        <div class="col-xl-2 col-lg-2 d-xl-inline-block d-lg-inline-block">
            <div style="position: relative; left: 50%; top: 50%; transform: translate(-50%, -50%); height: 50px; width: 145px;">
                <div class="fb_inst">
                    <img src="images/facebook.png" alt="">
                </div>
                <div class="fb_inst">
                    <img src="images/instagram.png" alt="">
                </div>
                <div class="fb_inst">
                    <img src="images/website.png" alt="">
                </div>
            </div>
        </div>
        <div class="col-xl-1 col-lg-1 d-xl-inline-block d-lg-inline-block d-md-none">
        
        </div>
    </div>

    <!-- Prikaz loading-a -->
    <div class="darker_background">
        <img src="images/loading.gif" alt="loading...">
    </div>
</body>
</html>