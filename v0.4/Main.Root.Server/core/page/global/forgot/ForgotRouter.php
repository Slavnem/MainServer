<?php
define("EPASSWORD", 0);
define("EUSERNAME", 1);
define("EEMAIL", 2);
define("EHOMEPAGE", 3);
define("ERESETNOW", 4);

$RouterUrl = [
    "//main.server.com/forgot/password",
    "//main.server.com/forgot/username",
    "//main.server.com/forgot/email",
    "//main.server.com/"
];

$TextRoute = [
    "Reset Password",
    "Reset Username",
    "Reset Email",
    "Homepage",
    "Reset Now ..."
];

$StyleUrl = [
    "//main.server.com/core/style/static/route/forgot/routeforgot.css"
];
?>
<!-- FORGOT ROUTER -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- TITLE -->
    <title>Forgot Router</title>
    <!-- META -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo $StyleUrl[0]; ?>" />
</head>
<body>
    <main id="id_forgotroute_main" class="forgotroute_main">
        <section id="id_forgotroute_area" class="forgotroute_area">
            <h1 id="id_forgot_title_resetnow" class="forgot_title_resetnow"><?php echo $TextRoute[ERESETNOW]; ?></h1>
            <div id="id_forgotroute_redirect_area" class="forgotroute_redirect_area">
                <a id="id_forgot_pwd_btn" class="forgot_btn forgot_pwd_btn" href="<?php echo $RouterUrl[EPASSWORD]; ?>"><?php echo $TextRoute[EPASSWORD]; ?></a>
                <a id="id_forgot_uname_btn" class="forgot_btn forgot_uname_btn" href="<?php echo $RouterUrl[EUSERNAME]; ?>"><?php echo $TextRoute[EUSERNAME]; ?></a>
                <a id="id_forgot_email_btn" class="forgot_btn forgot_email_btn" href="<?php echo $RouterUrl[EEMAIL]; ?>"><?php echo $TextRoute[EEMAIL]; ?></a>
                <a id="id_forgot_email_btn" class="forgot_btn forgot_email_btn" href="<?php echo $RouterUrl[EHOMEPAGE]; ?>"><?php echo $TextRoute[EHOMEPAGE]; ?></a>
            </div>
        </section>
    </main>
    <!-- JAVASCRIPT -->
    <script nonce type="module" src="//main.server.com/core/tool/global/route/forgot/RouteForgotProcess.js"></script>
</body>
</html>