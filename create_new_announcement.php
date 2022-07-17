<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@300&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="javascript/main.js?v=<?php echo time(); ?>"></script>
    <title>MobileShop - Create New Announcement</title>
    <script src="PapaParse-5.0.2/papaparse.js"></script>
</head>
<body onload="on_load_function()">
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
                    <img src="images/user.png" style="width: 22px" class="user_heart_bag" alt="" onclick="show_login_large_devices()">
                    <img src="images/heart.png" style="margin-top: 5px;" class="user_heart_bag" alt="">
                    <img src="images/bag.png" style="width: 25px" class="user_heart_bag" alt="" onclick="show_bag_preview_container()">
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

    <!-- Main Div Container -->
    <div class="row" style="width: 100%; background-color: #F3F3F3">
        <div class="w-100 row" style="min-height: 200px;">
            <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 h-2 d-xl-inline-block d-lg-inline-block d-md-none d-none"></div>
            <div class="col-xl-3 col-lg-3 h-xl-100 h-lg-100 h-md-25 h-sm-25 d-inline-block row ml-xl-3 ml-lg-3 ml-md-none ml-sm-none" id="choose_category_container" style="cursor: pointer; background-color: white; border-bottom: 2px solid #ff006a">
                <div class="h-100" style="width: 35%; float: left;">
                    <h1 style="margin-right: 10px; float: right; position: relative; top: 50%; transform: translateY(-50%)">1.</h1>
                </div>
                <div class="h-100" style="width: 65%; float: left;">
                    <div style="position: relative; top: 50%; transform: translateY(-50%)">
                        <h5 style="margin-bottom: 0; font-weight: bold;">Kategorija</h5>
                        <p style="font-size: 14px;" id="choose_category_info">Izaberete kategoriju.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 h-xl-100 h-lg-100 h-md-25 d-inline-block row" id="choose_mobile_phone_brand_container" onclick="goto_main_information()" style="cursor: pointer; background-color: white;">
                <div class="h-100" style="width: 35%; float: left;">
                    <h1 style="margin-right: 10px; float: right; position: relative; top: 50%; transform: translateY(-50%)">2.</h1>
                </div>
                <div class="h-100" style="width: 65%; float: left;">
                    <div style="position: relative; top: 50%; transform: translateY(-50%)">
                        <h5 style="margin-bottom: 0; font-weight: bold;">Opis proizvoda</h5>
                        <p style="font-size: 14px;" id="opis_proizvoda_completed">Osnovne informacije.</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 h-xl-100 h-lg-100 h-md-25 d-inline-block row" id="pricing_and_images" style="background-color: white; cursor: pointer;" onclick="goto_pricing()">
                <div class="h-100" style="width: 35%; float: left;">
                    <h1 style="margin-right: 10px; float: right; position: relative; top: 50%; transform: translateY(-50%)">3.</h1>
                </div>
                <div class="h-100" style="width: 65%; float: left;">
                    <div style="position: relative; top: 50%; transform: translateY(-50%)">
                        <h5 style="margin-bottom: 0; font-weight: bold;">Cena i fotografije</h5>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-2 col-md-0 col-sm-0 col-0 h-100 d-xl-inline-block d-lg-inline-block d-mg-none d-sm-none" style="background: white; cursor: pointer;" id="preview">
                <div style="display: block; margin: auto; width: 100px; position: relative; top: 50%; transform: translateY(-50%)">
                    <img src="images/preview.png" alt="" style="display: block; margin: auto;">
                    <p style="font-size: 14px; text-align: center;">Pregled</p>
                </div>
            </div>
        </div>

        <!-- Categories choose -->
        <div style="display: block; width: 100%;" id="categories_container">
            <div class="w-100 row" style="height: 800px;" id="categories">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 d-xl-inline-block d-lg-inline-block d-md-inline-block d-sm-inline-block d-none ml-3" style="height: 20%;">
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-xl-inline-block d-lg-inline-block d-md-inline-block d-sm-none d-none" style="height: 20%;"></div>
                    <h2 class="m-0 col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 d-inline-block ml-3" style="position: relative; top: 50%; transform: translateY(-50%);">Choose Category: </h2>
                    <h2 class="m-0 col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 ml-3" style="position: relative; top: 50%; transform: translateY(-50%); display: none;" id="choose_brand_text">Choose Brand: </h2>
                    <h2 class="m-0 col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 ml-5" style="position: relative; top: 50%; transform: translateY(-50%); display: none;" id="choose_model_text">Choose Model: </h2>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-xl-inline-block d-lg-inline-block d-md-none d-sm-none d-none" style="height: 70%;"></div>

                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 ml-xl-3 ml-lg-3 ml-md-0 ml-sm-0 d-inline-block" style="height: 15%;">
                    <div class="same_categories_container" onclick="show_mobile_phones(this)">
                        <h4 style="font-weight: bold; text-align: center; position: relative; top:50%; transform:translateY(-50%);">Mobile Phones</h4>
                    </div>
                    <div class="same_categories_container" style="margin-top: 20px;">
                        <h4 style="font-weight: bold; text-align: center; position: relative; top:50%; transform:translateY(-50%)">Tablets</h4>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 ml-xl-3 ml-lg-3 ml-md-0 ml-sm-0" style="max-height: 60%; overflow-y: auto; display: none;" id="mobile_phones"></div>
                <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 ml-5" style="max-height: 60%; overflow-y: auto; " id="phone_models"></div>
                
                <div class="w-100" style="height: 10%; border-top: 2px solid lightgrey">
                    <button class="next_step_button_desing" disabled style="opacity: 0.4;" onclick="next_step_one()">Next Step</button>
                    <button class="next_step_button_desing" disabled style="margin-right: 20px; opacity: 0.4;">Previus Step</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Najbitniji podaci -->
    <div class="w-100 row" style="height: 400px; display: none;" id="main_information">
        <div class="w-100" style="height: 80%;">
            <div class="w-100 row" style="height: 40%">
                <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 d-inline-block pt-5 h-100">
                    <h2 style="font-weight: bold;">Unesite sve potrebne informacije</h2>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
            </div>
            <div class="col-12 row mt-3">
                <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                <div class="col-xl-8 col-lg-8 row">
                    <div class="col-xl-4 col-lg-4 d-inline-block h-100">
                        <p class="ml-0 pl-0 mb-2" style="font-weight: bold;">Naslov proizvoda <span style="color:red">*</span></p>
                        <input type="text" id="project_title_value" class="w-100 other_information_input" onchange="project_title_change(this)">
                        <p id="project_title_error" style="font-size: 12px; color: red; display: none;"></p>
                    </div>
                    <div class="col-xl-4 col-lg-4 d-inline-block h-100">
                        <p class="ml-0 pl-0 mb-2" style="font-weight: bold;">Broj telefona <span style="color:red">*</span></p>
                        <input type="text" id="phone_number_value" class="w-100 other_information_input" onchange="phone_number_change(this)">
                        <p id="phone_number_error" style="font-size: 12px; color: red; display: none;"></p>
                    </div>
                    <div class="col-xl-4 col-lg-4 d-inline-block h-100">
                        <p class="ml-0 pl-0 mb-2" style="font-weight: bold;">Stanje <span style="color:red">*</span></p>
                        <button class="new_used" onclick="select_new()" style="background-color: #ff006a; color: white;">Novo</button>
                        <button class="new_used" onclick="select_used()">Polovno</button>
                    </div>
                </div>
                <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
            </div>
        </div>
        <div class="w-100" style="height: 20%; border-top: 2px solid lightgrey">
            <button class="next_step_button_desing" disabled style="opacity: 0.4;" id="next_step" onclick="next_step_two()">Next Step</button>
            <button class="next_step_button_desing" style="margin-right: 20px; " onclick="previus_step_two()">Previus Step</button>
        </div>
    </div>

    <!-- Images and pricing -->
    <div style="display: none; width: 100%;" id="price_image_container">
        <div class="w-100 row" id="categories">
            <div class="w-100" style="height: 90%">
                <div class="w-100 row" style="height: 10%">
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 d-inline-block pt-5 h-100">
                        <h2 style="font-weight: bold;">Unesite sve potrebne informacije</h2>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                </div>
                <div class="col-12 row mt-2" style="height: 15%">
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                    <div class="col-xl-8 col-lg-8 row">
                        <div class="col-xl-6 col-lg-6 d-inline-block">
                            <p class="ml-0 pl-0 mb-2" style="font-weight: bold;">Opis proizvoda <span style="color:red">*</span></p>
                            <textarea id="project_description_value" class="w-100 other_information_input" style="height: 100px;" onchange="project_description_change(this)"></textarea>
                            <p id="project_description_error" style="font-size: 12px; color: red; display: none;"></p>
                        </div>
                        <div class="col-xl-6 col-lg-6 d-inline-block h-100" style="height: 100px;">
                            <p class="ml-0 pl-0 mb-2" style="font-weight: bold;">Napomene</span></p>
                            <textarea id="project_notes_value" class="w-100 other_information_input" style="height: 100px;"></textarea>
                            <p id="phone_number_error" style="font-size: 12px; color: red; display: none;"></p>
                        </div>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                </div>
                <div class="col-12 row mt-2">
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                    <div class="col-xl-8 col-lg-8 row">
                        <div class="col-xl-6 col-lg-6 d-inline-block">
                            <p class="ml-0 pl-0 mb-2" style="font-weight: bold;">Cena proizvoda (€) <span style="color:red">*</span></p>
                            <div class="d-inline-block">
                                <input type="number" name="" id="project_price" onchange="project_price_change(this)">
                                <p id="project_price_error" style="font-size: 12px; color: red; display: none;"></p>
                            </div>
                            <div class="d-inline-block ml-2">
                                <input type="checkbox" id="call_for_price" onchange="call_price(this)"> Pozovite
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                </div>
                <div class="w-100 row" style="height: 10%">
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 d-inline-block pt-5 h-100">
                        <h2 style="font-weight: bold;">Izaberite fotografije</h2>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                </div>
                <div class="col-12 row">
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                    <div class="col-xl-8 col-lg-8 row">
                        <div class="w-100 row" id="uploaded_images_preview">
                            <input type="file" style="display: none;" id="select_images" onchange="select_images_change(event)" accept="image/png, image/jpeg" multiple>
                            <div class="col-6 upload_image upload_image_icon_to_remove" style="display: inline-block">
                                <img src="images/upload.png" class="upload_image_icon" onclick="document.getElementById('select_images').click()" class="w-100">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                </div>
                <div class="col-12 row mt-3">
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                    <div class="col-xl-8 col-lg-8 row">
                        <div class="w-100 row">
                            <p style="font-weight: bold; color:#ff006a;">Naslovna fotografija je automatski postavljena u zavisnosti od mobilnog telefona koji ste odabrali. Slike koje izaberete bice vidljive u galeriji Vaseg oglasa.</p>
                        </div>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                </div>
                
            </div>
            <div class="w-100" style="height: 80px; border-top: 2px solid lightgrey">
                <button class="next_step_button_desing" disabled style="opacity: 0.4;" id="next_step_three" onclick="show_preview()">Pregled</button>
                <button class="next_step_button_desing" disabled style="margin-right: 20px; opacity: 0.4;">Prethodni korak</button>
            </div>
        </div>
    </div>

    <!-- Ads Preview -->
    <div style="display: none; width: 100%;" id="preview_container">
        <div class="w-100 row" id="categories">
            <div class="w-100">
                <div class="w-100 row">
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 d-inline-block pt-5 h-100">
                        <h2 style="font-weight: bold; padding: 0;" id="title_preview">Na prodaju novi iphone 10</h2>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                </div>
                <div class="w-100 row">
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 d-inline-block">
                        <p style="margin: 0; padding:0; color:#6D6D6D">
                            Brend: <span style="color: black;" id="brand_preview">Apple</span>&nbsp; | &nbsp;
                            Prodavac: <span style="color: black;">Djordje Ivanovic</span>&nbsp; | &nbsp;
                            Kontakt: <span style="color: black;" id="phone_number_preview">Apple</span>
                        </p>
                    </div>
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                </div>
                <div class="w-100 row">
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                    <div class="col-xl-4 col-lg-9 col-md-12 col-sm-12 col-12 d-inline-block h-100 pt-3">
                        <div style="border: 1px solid grey; width: 100%; height: 400px;">
                            <img src="" alt="Doslo je do greske, molimo pokusajte kasnije." id="main_image" style="display: block; margin: auto; position: relative; top: 50%; transform: translateY(-50%)">
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-9 col-md-12 col-sm-12 col-12 d-inline-block h-100 p-4">
                        <div style="width: 100%; height: 400px;">
                            <h3 style="color:#ff006a; font-weight: bold;" id="price_preview">650$</h3>
                            <h4 style="font-weight: bold;" id="brand_model_preview">Apple iPhone X</h4>
                            <br>
                            <p style="color: #6D6D6D" id="description_preview">Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta minus deserunt explicabo illo nulla hic eius? Excepturi iure, labore ipsam soluta nemo laboriosam atque provident perspiciatis asperiores inventore, explicabo consectetur?</p>
                            <br>
                            <p style="color: #6D6D6D">Kategorija: <span style="color: black; font-weight: bold;" id="category_preview">Mobilni Telefoni</span></p>
                            <p style="color: #6D6D6D">Napomene: <span style="color: black; font-weight: bold;" id="notes_preview">Nema</span></p>
                            <p style="color: #6D6D6D">Stanje: <span style="color: black; font-weight: bold;" id="state_preview">Polovno</span></p>
                        </div>
                    </div>
                </div>
                <div class="w-100 row">
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                    <div class="col-xl-4 col-lg-9 col-md-12 col-sm-12 col-12 d-inline-block h-100">
                        <div style="width: 100%; height: 100px;" id="small_images_main_container">
                        </div>
                    </div>
                </div>
                <div class="w-100 row">
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                    <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                    <div class="col-xl-8 col-lg-9 col-md-12 col-sm-12 col-12 d-inline-block h-100">
                        <div style="width: 100%; height: 70px;" id="small_images_main_containerr">
                            <div class="small_images_main_container_buttons">
                                <button id="dugme_opis" onclick="description_show()">Opis</button>
                                <button id="dugme_specifikacije" onclick="specifications_show()">Specifikacije</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="description_main_container">
                    <div class="w-100 row">
                        <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                        <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                        <div class="col-xl-8 col-lg-9 col-md-12 col-sm-12 col-12 d-inline-block h-100">
                            <div style="width: 100%;" id="opis_container">
                                <p id="opis_text" style="padding: 20px;">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta minus deserunt explicabo illo nulla hic eius? Excepturi iure, labore ipsam soluta nemo laboriosam atque provident perspiciatis asperiores inventore, explicabo consectetur?
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="specification_main_container">
                    <div class="w-100 row">
                        <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                        <div class="col-xl-1 col-lg-1 col-md-0 col-sm-0 col-0 d-inline-block h-100"></div>
                        <div class="col-xl-8 col-lg-9 col-md-12 col-sm-12 col-12 d-inline-block h-100">
                            <div style="width: 100%;" id="small_images_main_container">
                                <table id="tabela"></table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-100" style="height: 80px; border-top: 2px solid lightgrey">
                <button class="next_step_button_desing" id="next_step_three" onclick="next_step_three()">Postavi oglas</button>
                <button class="next_step_button_desing" style="margin-right: 20px;" onclick="previous_step_three()">Prethodni korak</button>
            </div>
        </div>
    </div>

    <div class="row banner ">
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
                <h5>SHOPPING CART</h5>
                <p onclick="close_bag_preview_container()">X</p>
            </div>
            <p style="width:100%; text-align: center; margin-top: 20px; color: grey;">No shopping in the carts.</p>
        </div>
    </div>
    
    <!-- Prikaz loading-a -->
    <div class="darker_background">
        <img src="images/loading.gif" alt="loading...">
    </div>
</body>

</html>
