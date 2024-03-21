<!-- HTML5/LOGIN -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="https://main.server.com/core/style/static/sign/login/login.css" />
</head>
<body>
    <main id="id_signmain" class="signmain">
        <section id="id_signarea" class="signarea">
            <!-- LOGIN AREA -->
            <div id="id_loginarea" class="loginarea">
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
                <!-- SUBMIT AREA -->
                <div id="id_submitarea" class="submitarea">
                    <button type="button" id="id_submit_btn" class="input_submit_btn submit_btn" name="submit_btn">Submit Area</button>
                </div>
                <!-- SIGNUP AREA -->
                <div id="id_signuparea" class="signuparea">
                    <a id="id_redirect_signup" class="redirect_btn redirect_signup" href="https://main.server.com/user/register">If you don't have an account, create one right now...</a>
                </div>
            </div>
        </section>
    </main>
    <!-- JAVASCRIPT -->
    <script nonce type="application/javascript" src="https://main.server.com/core/tool/global/sign/LoginProcess.js"></script>
    <script nonce type="application/javascript" src="https://main.server.com/core/tool/global/language/LanguageSupport.js"></script>
    <script nonce type="application/javascript" src="https://main.server.com/core/tool/global/background/BackgroundSelector.js"></script>
    <script nonce type="application/javascript" src="https://main.server.com/core/tool/global/session/SessionData.js"></script>
</body>
</html>