<!DOCTYPE HTML>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" type="text/css" href="register_page.css">
        <link rel="stylesheet" type="text/css" href="main.css">
        <link href='https://fonts.googleapis.com/css?family=Passion+One' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
        <meta charset = "UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
<body>
<div class="container">
    <div class="row main">
        <div class="panel-heading">
            <div class="panel-title text-center">
                <h1 class="title">Sign up, it's free!</h1>
                <hr />
            </div>
        </div>
        <div class="main-login main-center">
            <form name="form" class="form-horizontal" method="post" action="index.php">
                <div class="form-group">
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="firstname" id="name"  placeholder="First Name" required=""/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="lastname" id="email"  placeholder="Last Name" required=""/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="age" id="username"  placeholder="Age" required=""/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="birthday" id="password"  placeholder="Birthday" required=""/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="country" id="password"  placeholder="Country" required=""/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="text" class="form-control" name="email" id="confirm"  placeholder="Email" required=""/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="password" id="password"  placeholder="Password" required=""/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="cols-sm-10">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                            <input type="password" class="form-control" name="passwordconfirm" id="password"  placeholder="Confirm Password" required=""/>
                        </div>
                    </div>
                </div>

                <div class="form-group ">
                    <button type="submit" class="btn btn-primary btn-lg btn-block login-button">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>