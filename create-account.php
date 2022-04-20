<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="javascript/main.js"></script><title>Create Account - PhoneStore</title>
</head>
<body style="font-family: var(--e-global-typography-text-font-family);">
    <!-- Navigation Bar -->
    <div style="width: 100%; height: 25vh">
        <div class="w-100" style="height: 25%; background-color: #262626;">

        </div>
        <div class="w-100 row" style="height: 40%; border-bottom: 1px solid lightgrey">
            <div class="col-lg-1 col-md-1 col-sm-1 col-0 h-100 d-inline-block"></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-12 h-100 d-inline-block text-center d-flex align-items-center"><h1 class="box">LOGO<h1></div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-12 h-100 d-inline-block d-flex align-items-center">
                <div class="w-100 box">
                    <p class="mb-0 ml-3" style="font-weight: bold;">Send us a message</p>
                    <a class="mt-0 text-decoration-none ml-3 contact_us_email"><u>teamflaminqo@gmail.com</u></a>
                </div>
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-12 h-100 d-inline-block d-flex align-items-center" >
                <div class="w-100 box">
                    <p class="mb-0 ml-3" style="font-weight: bold;">Need help? Call us:</p>
                    <a class="mt-0 text-decoration-none ml-3 contact_us_email"><u>+381 3796520</u></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-12 h-100 d-inline-block"></div>
            <div class="col-lg-1 col-md-1 col-sm-1 col-0  h-100 d-inline-block" ></div>
        </div>
        <div class="w-100 row" style="height:35%;">
            <div class="col-lg-1 col-md-1 col-sm-1 col-0 h-100 d-inline-block"></div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-12 h-100 d-inline-block">
                <div class="dropdown h-100">
                    <button class="btn btn-secondary dropdown-toggle w-100" style="height: 70%; margin-top: 4%; background-color: #ed0b69; text-transform: uppercase; font-weight: bold; font-size:12px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        shop by categories
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="#">Mobiles</a>
                        <a class="dropdown-item" href="#">Tablets</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Account Main Div -->
    <div class="row" style="width: 100%; height: 75vh; background-color: #E8ECEC">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12 h-20">
            <h1 class="col-lg-4 col-md-4 col-sm-4 col-12 text-center" style="color: black; margin-top: 30px; font-weight: bold;">My account</h1>
            <p class="col-lg-4 col-md-4 col-sm-4 col-12 text-center"><span style="color: black">Home Page</span> > <span style="color: grey;">My Account </span></p>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-12 h-80 d-inline-block"></div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-12 h-80 d-inline-block">
            <h1 style="font-weight: bold;">Sign Up</h1>
            <form action="">
                <p style="margin-top: 30px; font-weight: bold;">Username or email address <span style="color:red">*</span></p>
                <input id="email" type="text" class="col-md-12 col-12 sign_up_form_input" placeholder="Enter your email address...">
                <p style="margin-top: 15px; font-weight: bold;">Password <span style="color:red">*</span></p>
                <input id="password" type="password" class="col-md-12 col-12 sign_up_form_input" placeholder="Enter your password...">
            </form>
            <p class="col-md-6 col-12 d-inline-block text-left ml-0 p-0" style="margin-top: 15px; color: grey"><span><input type="checkbox"/></span>  Remember me</p>
            <p class="col-md-6 col-12 d-inline-block text-right mr-0 p-0 " style="color: grey; cursor: pointer">Lost your password?</p>
            <button class="col-md-12 col-12 sign_up_form_submit" id="create_new_user">Sign Up</button>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-12 h-80 d-inline-block"></div>
    </div>
</body>
</html>