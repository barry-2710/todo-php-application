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
        #add-list{
            padding-top: 50px;
            justify-content: center;
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
            <div class="container">
                <form action="/search">
                    <div class="input-group" id="add-list">
                        <input type="text" name="add" class="form-control col-lg-6 shadow p-3 mb-5" placeholder="Add Todo Task" required>
                        <span class="input-group-btn">
                            <button class="btn btn-secondary" type="submit">Add</i></button>
                        </span>
                    </div>
                </form>
            </div>
            <div class="card text center container col-6 mt-5 mb-4" id="login">
                <div class="card-body" id="login_content">     
                    <span class="float-right" style="font-size:46px;" aria-hidden="true">&times;</span>
                    <h5>Complete the home work</h5>
                    <h6>Posted by : Barry</h6>
                    <h6 class="text-muted">12/10/2020</h6>
                </div>
            </div>
        </div>
        <?php include('footer.php') ?>


    </body>
</html>