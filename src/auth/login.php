<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>NowMusic - Login</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    <link rel="stylesheet" href="../../css/style.css"/>
    <link rel="stylesheet" href="../../css/form.css"/>
</head>
<body>
    <div class="container-fluid overflow-x-hidden p-0 h-100">
        <div class="row justify-content-center align-items-center h-100">
            <main class="col-10 col-md-4">
                <img src="../../assets/images/NowMusic-Logo.png" class="rounded mx-auto d-block" alt="NowMusic-Logo" width="112" height="112"/>
                <header class="text-center pb-5">
                    <h1>Log in to your account</h1>
                    <small>Welcome back! Please enter your details</small>
                </header>
                <form action="login_fnz.php" method="post">
                    <div class="row pb-2 px-3">
                        <label class="form-label" for="email">Email</label>
                        <input class="form-control" id="email" name="email" type="text" placeholder="Enter your email"/>
                    </div>
                    <div class="row pb-2 px-3">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" id="password" name="password" type="password" placeholder="Password"/>
                    </div>
                    <div class="text-center pb-2">
                        <strong><a href="./sign_up.php">Sing up</a></strong>
                    </div>
                    <div class="row pb-2 px-3">
                        <label class="submit" for="login" hidden>Login</label>
                        <input id="login" type="submit" class="btn" value="Log In"/>
                    </div>
                </form>
            </main>
        </div>
        <?php if($_GET["error"]==1) : ?>
            <div class="alert alert-danger fixed-bottom mh-4" role="alert">
                Email or Password is wrong!
            </div>
        <?php endif; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>