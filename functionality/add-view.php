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
<body onload="loadf(<?php echo $_GET['id'] ?>)">
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
        <div class="w-100 row">
            <div class="col-xl-1 col-lg-1 d-xl-inline-block d-lg-inline-block d-md-none d-sm-none h-100 d-inline-block bg-dark"></div>
            <div class="col-xl-3 col-lg-3 col-md-3 d-xl-inline-block d-lg-inline-block d-md-none d-sm-none d-none">
                <p class="mt-3 mb-3 w-100">putanja</p>
            </div>
        </div>
        <div class="w-100 row">
            <div class="col-xl-1 col-lg-1 d-xl-inline-block d-lg-inline-block d-md-none d-sm-none h-100 d-inline-block bg-dark"></div>
            <div class="col-xl-3 col-lg-3 col-md-3 d-xl-inline-block mb-3 d-lg-inline-block">
                <div class="row">
                    <div class="w-100" id="newest_ads" style="border: 10px solid rgb(241, 243, 248); background-color: white; border-radius: 20px;">
                        <div style="width: 80%; height: 50px; display: block; margin: auto;">
                            <p style="font-weight: bold; position: relative; top: 50%; transform: translateY(-50%); font-size: 20px;">Novi oglasi</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-7 d-xl-inline-block ml-3 mb-3 d-lg-inline-block">
                <div class="row">
                    <div class="w-100" style="background: white; border: 10px solid rgb(241, 243, 248); border-radius: 20px;">
                        <div class="w-100 pl-4 pt-4">
                            <h3 style="font-weight: bold;" id="title"></h3>
                        </div>
                        <div class="w-100 pl-4 pt-2">
                            <p style="color: grey;">Brend: <span><a id="brand_show" href="#"></a></span><span style="margin-left: 20px; margin-right: 20px;">|</span>
                            Prodavac: <span><a href="#" id="customer_show"></a></span><span style="margin-left: 20px; margin-right: 20px;">|</span>Telefon: <span><a href="#" id="mobile_phone_show" style="text-decoration: none; color: black; cursor:auto;"></a></span>
                            </p>
                        </div>
                        <div class="w-100 pl-4 pt-4 pr-4 pb-4 row">
                            <div class="images-div col-6">
                                <div class="margin-div" style="width: 100%; height: 100%;">
                                    <div id="zoomC" style="width: 100%; height: 350px;"></div>
                                    <div id="img-div" style="width: 100%; height: 100px; margin-top: 20px;"></div>
                                </div>
                                
                            </div>
                            <div class="col-6">
                                <div class="w-100">
                                    <h4 id="price_preview"></h4>
                                </div>
                                <div class="w-100 mt-4">
                                    <p id="description_preview"></p>
                                </div>
                                <hr>
                                <div class="w-100">
                                    <button id="send_message_preview" onclick="send_message()">Posalji poruku</button>
                                    <button id="add_to_favorite" onclick="add_to_favorite()">❤</button>
                                </div>
                                <hr>
                                <div class="w-100 mt-4">
                                    <p style="color: grey">Kategorija: <span style="color: black" id="categories_preview"></span></p>
                                    <p style="color: grey">Napomene: <span style="color: black" id="notes_preview"></span></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-100 mt-3" style="background: white; border: 10px solid rgb(241, 243, 248); border-radius: 20px;">
                        <div class="w-100 pl-4" style="border-bottom: 1px solid lightgrey;">
                            <div class="additional_information" style="border-bottom: 3px solid red;">
                                <p style="color: black;" onclick="show_description()">Opis</p>
                            </div>
                            <div class="additional_information">
                                <p onclick="show_specifications(this)">Specifikacije</p>
                            </div>
                            <div class="additional_information" onclick="show_3d_model()">
                                <p onclick="">3D Model</p>
                            </div>
                        </div>
                        <div class="w-100" id="description_main">
                            <p id="description" style="padding: 30px; color: grey;"></p>
                        </div>
                        <div class="w-100 p-4" id="specifications_main" style="display: none;">
                            <div id="specs-div">
                                <table id="specs-table">

                                </table>
                            </div>
                        </div>
                        <div class="w-100" style="height: 700px; display: none;" id="3d_model_preview">
                            <model-viewer id="pregled_modela" style="width: 100%; height: 100%;" src="" alt="Model trenutno nije dostupan ili je doslo do greske. Molimo pokusajte kasnije!" auto-rotate camera-controls ar ios-src="" shadow-intensity="1"></model-viewer>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="w-100" style="background-color: rgb(241, 243, 248)">
    <div class="open-img-div">
        
        <div class="main-div d-none">
            <h1 id="title"></h1>
            <div class="images-div" >
                <div class="margin-div">
                    <button id="open-img-btn" onclick="open_img()"></button>
                    <div id="zoomC"></div>
                    
                
                    <button id="prev-btn" onclick="prev_img()">&#8249;</button>
                    <button id="next-btn" onclick="next_img()">&#8250;</button>
                </div>
                
            </div>
            
            

            <div class="data-div">
                <p>Ime i Prezime</p>
                <p class="data" id="left"></p>
                <p>Kategorija</p>
                <p class="data" id="left"></p>
                <p>Brend</p>
                <p class="data" id="left"></p>
                <p>Model</p>
                <p class="data" id="left"></p>
                <p>Cena</p>
                <p class="data" id="left"></p>
                <p>Stanje</p>
                <p class="data" id="left"></p>
                
                <p>Napomena</p>
                <p class="data"></p>
                <p>Kontakt telefon</p>
                <p class="data" id="left"></p>
                <p>Mesto</p>
                <p class="data"></p>
                <p>Oglas je postavljen:</p>
                <p class="data" id="left"></p>

            </div>

            
        </div>  

    </div>
    </div>

    <!-- Send Message Container -->

    <div class="dark_backgroundd" onclick="close_message_container()" style="display: none;"></div>
    <div class="send_message_container" style="display: none; border-radius: 10px;">
        <div class="w-100" style="height: 50px; border-bottom: 1px solid lightgrey; background-color:#ed0b69; border-radius: 10px 10px 0 0;">
            <p style="font-size: 20px; font-weight: bold; padding: 10px; color: white;"><span style="color: white">Kontaktirajte oglasivaca </span>
            (<span id="message_name">Djordje Ivanovic</span>)</p>
        </div>
        <div class="w-100" style="border-bottom: 1px solid lightgrey;">
            <p style="padding: 10px 0 0 10px; font-size: 14px; margin: 0;">Telefon: <span style="font-weight: bold;" id="message_phone">063-7303883</span></p>
            <p style="padding: 5px 0 0 10px; font-size: 14px;">Mesto: <span style="font-weight: bold;">Leskovac</span></p>
        </div>
        <div class="w-100">
            <p style="font-size: 20px; font-weight: bold; padding: 20px 0 0 10px; margin: none;"><span style="color: #ed0b69;">Tekst vase poruke </span></p>
            <div style="padding: 0 10px 10px; border-bottom: 1px solid lightgrey" >
                <div style="background:rgb(241, 243, 248);height: 185px;">
                    <p style="padding: 10px 0 0 2%; font-size: 14px">Unesite tekst vase poruke</p>
                    <textarea name="" id="message_value" style="width: 96%; height: 120px; resize: none; display: block; margin: auto; padding: 10px;"></textarea>
                </div>
            </div>
            
        </div>
        <button style="margin: 15px; float: right; width: 120px; border: none; height: 40px; background: #ed0b69; color: white; border-radius: 10px" onclick="send_first_message()">Posalji</button>
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