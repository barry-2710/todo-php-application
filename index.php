<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
         body{
            background-image: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2)),url('src/images/bg-4.jpg');
         }
        #login{
            background: rgba(255, 255, 255, 0.8);
        }
        .main-content{
            min-height: 100vh;
        }
    </style>
</head>
    <body>
        <!-- This is Navbar -->
        <?php include "navbar.php"; ?>
        <!-- Content starts from here -->
        <div class="main-content">
            <div class="card text center container col-6 mt-5 mb-4" id="login">
                <div class="card-body" id="login_content">
                    <!-- Default form login -->
                    <form class="text-center p-4 " action="#!">

                        <h3 class="h4 mb-4">Sign in</h3>

                        <!-- Email -->
                        <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">

                        <!-- Password -->
                        <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">

                        <!-- Sign in button -->
                        <button class="btn btn-dark btn-block my-4" type="submit" style="border-radius:20px;">Sign in</button>

                        <!-- Register -->
                        <p>Not a member?
                            <a href="register.php">Register</a>
                        </p>
                        
                        </form>
                        <!-- Default form login -->
                </div>
            </div>
        </div>
        <?php include('footer.php') ?>


    </body>
</html>