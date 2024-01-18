<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>NowMusic - Sign up</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/form.css"/>
    <script type="module" src="./sign_up.js"></script>
</head>
<body>
    <div class="container-fluid overflow-x-hidden h-100">
        <div class="row justify-content-center align-items-center h-100">
            <main class="col-10 col-md-4">
                <img src="../../assets/images/NowMusic-Logo.png" class="rounded mx-auto d-block" alt="NowMusic-Logo" width="112" height="112"/>
                <header class="text-center pb-5">
                    <h1>Create an Account</h1>
                    <small>Join our community of Music fan</small>
                </header>
                <form action="sign_up_fnz.php" method="post">
                    <div class="row pb-2 px-3">
                        <label class="form-label" for="username">Username</label>
                        <input class="form-control" id="username" name="username" type="text" placeholder="Enter your username"/>
                    </div>
                    <div class="row pb-2 px-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" id="email" name="email" type="text" placeholder="Enter your email"/>
                    </div>
                    <div class="row pb-2 px-3">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" id="password" name="password" type="password" placeholder="Password"/>
                        <label class="form-label" for="crypt_password" hidden>Crypted Password</label>
                        <input name="crypt_password" type="hidden" id="crypt_password"/>
                    </div>
                    <div class="row pb-2 px-3">
                        <label class="form-label" for="repeat_password">Repeat Password</label>
                        <input class="form-control" id="repeat_password" type="password" placeholder="Repeat Password"/>
                    </div>
                    <div class="text-center pb-2">
                        <strong><a href="index.html">Login</a></strong>
                    </div>
                    <div class="row pb-2 px-3">
                        <label class="form-check-label" for="sign_up" hidden>sign_up</label>
                        <input id="sign_up" type="submit" class="btn" value="Sign up"/>
                    </div>
                </form>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>