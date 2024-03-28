<?php
// Enum
define("EFORGOT", 0);
define("EREGISTERNOW", 1);
define("EURLADDR", 0);
define("ETEXT", 1);

// Yönlendirilecek adresleri dizi de saklama
$RouteUrl = [
    [
        "//main.server.com/route/forgot",
        "I Can't Login"
    ],
    [
        "//main.server.com/user/register",
        "If you don't have an account, create one right now..."
    ]
];
?>
<!-- LOGIN -->
<!DOCTYPE html>
<html>
<head>
    <!-- TITLE -->
    <title>Login</title>
    <!-- META -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="//main.server.com/core/style/static/sign/login/login.css" />
</head>
<body>
    <!-- SIGN MAIN AREA -->
    <main id="id_signmain" class="signmain">
        <!-- SIGN SUB AREA -->
        <section id="id_signarea" class="signarea">
            <!-- LOGIN AREA -->
            <div id="id_loginarea" class="loginarea">
                <!-- INFO AREA -->
                <div id="id_infoarea" class="infoarea">
                    <button id="id_info_btn_question" class="info_btn info_btn_question"></button>
                    <p id="id_info_text" class="info_text">
                        If you click twice in succession on the password entry section,
                        you can see the password you entered as text and if you click again in succession,
                        you can see it again as a password
                    </p>
                </div>
                <!-- TITLE AREA -->
                <div id="id_titlearea" class="titlearea">
                    <div id="id_titlearea_textarea" class="titlearea_textarea">
                        <h1 id="id_textarea_title" class="textarea_title">Login Now...</h1>
                        <p id="id_textarea_description" class="textarea_description">Welcome to the Main Server</p>
                    </div>
                </div>
                <!-- INPUT AREA -->
                <div id="id_inputarea" class="inputarea">
                    <input type="text" name="username" id="id_username" class="input_data input_username" placeholder="Abcd..." />
                    <input type="password" name="password" id="id_password" class="input_data input_password" placeholder="****" />
                </div>
                <!-- FORGOT AREA -->
                <div id="id_forgotarea" class="forgotarea">
                    <a id="id_forgot_btn" class="forgot_btn" href="<?php echo $RouteUrl[EFORGOT][EURLADDR]; ?>"><?php echo $RouteUrl[EFORGOT][ETEXT]; ?></a>
                </div>
                <!-- SUBMIT AREA -->
                <div id="id_submitarea" class="submitarea">
                    <button type="button" id="id_submit_btn" class="input_submit_btn submit_btn" name="submit_btn">Login</button>
                </div>
                <!-- SIGNUP AREA -->
                <div id="id_signuparea" class="signuparea">
                    <a id="id_redirect_signup" class="redirect_btn redirect_signup" href="<?php echo $RouteUrl[EREGISTERNOW][EURLADDR]; ?>"><?php echo $RouteUrl[EREGISTERNOW][ETEXT]; ?></a>
                </div>
            </div>
        </section>
    </main>
    <!-- NOSCRIPT -->
    <noscript>Enable JavaScript</noscript>
    <!-- JAVASCRIPT -->
    <script nonce type="module" src="//main.server.com/core/tool/global/sign/LoginProcess.js"></script>
</body>
</html>