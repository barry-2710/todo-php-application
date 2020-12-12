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
                <p class="display-4 text-center text-white">Admin Dashboard</p>
            </div>
            <div class="card text center container col-6 mt-5 mb-4" id="login">
                <div class="card-body" id="login_content">    
                    <h2 class="display-5 text-center">User List [3]</h2>
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email </th>
                        <th scope="col">Registered on</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>Barry</td>
                        <td>barry@gmail.com</td>
                        <td>12/12/2020</td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                        <td>Garry</td>
                        <td>garry112@gmail.com</td>
                        <td>11/12/2020</td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>larrylarry@gmail.com</td>
                        <td>11/12/2020</td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <?php include('footer.php') ?>


    </body>
</html>