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
            <div class="container pt-4">
                <p class="display-4 text-center text-white">Welcome</p>
            </div>
        </div>
        <?php include('footer.php') ?>


    </body>
</html>