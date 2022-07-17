<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css?v=<?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="../javascript/main.js?v=<?php echo time(); ?>"></script>
    <title>MobileShop | Oglas</title>
    <link rel="icon" type="image/x-icon" href="../images/logo2.jpg">
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300&display=swap" rel="stylesheet">
    <script src="../PapaParse-5.0.2/papaparse.js"></script>
	<script type="module" src="https://unpkg.com/@google/model-viewer/dist/model-viewer.min.js"></script>
	<script nomodule src="https://unpkg.com/@google/model-viewer/dist/model-viewer-legacy.js"></script>
</head>
<body onload="loadmessages()">
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
                    <img src="../images/user.png" id="login_button" style="width: 22px" class="user_heart_bag" alt="">
                    <img src="../images/heart.png" style="margin-top: 5px;" class="user_heart_bag" alt=""  onclick="show_bag_preview_container()">
                    <img src="../images/bagg.png" style="width: 25px" class="user_heart_bag" alt="">
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
                <img src="../images/menu.png" class="pl-3 menu_bag" alt="" onclick="show_tablet_menu()">
            </div>
            <div class="col-sm-6 col-6 d-xl-none d-lg-none d-md-none d-sm-inline-block d-inline-block">
                <h2 class="text-center">MOBILESHOP</h2>
            </div>
        </div>
    </div>
    <div class="w-100" style="background-color: rgb(241, 243, 248)">
        <div class="w-100 row pb-5">
            <div class="col-xl-1 col-lg-1 d-xl-inline-block d-lg-inline-block d-md-none d-sm-none h-100 d-inline-block bg-dark"></div>
            <div class="col-xl-10 col-lg-10 col-md-10 d-xl-inline-block d-lg-inline-block d-md-none d-sm-none d-none">
                <h2 class="mt-3 mb-3 w-100">Moje poruke</h2>
            </div>
            <div class="col-xl-1 col-lg-1 d-xl-inline-block d-lg-inline-block d-md-none d-sm-none h-100 d-inline-block bg-dark"></div>

            <div class="col-xl-1 col-lg-1 d-xl-inline-block d-lg-inline-block d-md-none d-sm-none h-100 d-inline-block bg-dark"></div>
            <div class="col-10 row ml-1" style="height: 650px;">
                <div class="col-4 h-100 d-inline-block" style="border: 2px solid white; border-radius: 10px 0 0 10px">
                    <div class="row pt-3 pb-3">
                        <div class="col-1"></div>
                        <button class="d-inline-block col-5" id="kontaktirao" onclick="message_action(1)" style="height: 30px; border: none; background:#ed0b69; color: white; border-radius: 10px;">Kontaktirao</button>
                        <button class="d-inline-block col-5" id="kontaktirali" onclick="message_action(2)" style="border: none; background: white; color:#ed0b69; border-radius: 10px;">Kontaktirali</button>
                    </div>
                    <div id="messages_preview"></div>
                    <div id="messages_preview1" style="display: none;"></div>
                </div>
                <div class="col-8 h-100 d-inline-block bg-white" id="msg" style="border-radius: 0 10px 10px 0">
                    <div class="w-100 row ml-1 mt-2 name_message_container">
                    </div>
                    <div class="col-12 main_message_container" id="messages_div">
                    </div>
                    <div class="col-12 row" style="height: 50px; margin-top: 10px; ">
                        <div class="col-10 h-100 d-inline-block">
                            <input type="text" id="messagevalue"  style="width: 100%; height: 40px; margin-top: 5px; border: 1px solid lightgrey; outline: none; padding: 10px; border-radius: 10px">
                        </div>
                        <div class="col-2 h-100 d-inline-block" >
                            <button style="width: 100%; height: 40px; margin-top: 5px; border: 1px solid #ed0b69; outline: none; background: #ed0b69; color: white; border-radius: 10px; font-weight: bold;"
                            onclick="send_message()">send</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-1 col-lg-1 d-xl-inline-block d-lg-inline-block d-md-none d-sm-none h-100 d-inline-block bg-dark"></div>
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
            <img src="../images/serbia.png" alt="">
            <img src="../images/england.png" alt="">
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
            <img src="../images/image.png" style="position: relative; left: 50%; top: 50%; transform: translate(-50%, -50%)" alt="">
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
                    <img src="../images/facebook.png" alt="">
                </div>
                <div class="fb_inst">
                    <img src="../images/instagram.png" alt="">
                </div>
                <div class="fb_inst">
                    <img src="../images/website.png" alt="">
                </div>
            </div>
        </div>
        <div class="col-xl-1 col-lg-1 d-xl-inline-block d-lg-inline-block d-md-none">
        
        </div>
    </div>

    <!-- Prikaz loading-a -->
    <div class="darker_background">
        <img src="../images/loading.gif" alt="loading...">
    </div>
</body>
</html>