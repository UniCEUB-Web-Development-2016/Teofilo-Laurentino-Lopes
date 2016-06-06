<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset = "UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Network</title>
    </head>
<body id="bd">
    <div id="header">
        <h2>Sign in to Network</h2>
    </div>
    <div id="box">
        <form method="POST" action = "initial_page.php" id="form_register">
        <br>
        <input type = "text" name="name" id="field" placeholder="Login" required=""><br><br>
        <input type = "password" name= "password" id="field" placeholder="Password" size="28" required=""><br>
        <a href="forgot_password.php" id="forgot_password">Forgot password?</a><br><br>
        <input type="submit" id="button" value="Sign in"><br>
    <div id="register_form">
        New Here?
        <a href="register.php">Create an account</a>
    </div>
        </form>
    </div>
</body>
</html>