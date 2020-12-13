<?php
    session_start(); 
    include "db.php";
    if(isset($_SESSION["loggedin"])) {
        if($_SESSION["admin"]==1){
            header("Location: admin_home.php");
            exit();
        }
        else{
            header("Location: user_home.php");
            exit();
        }
    }
?>
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
    <!-- This is the login code -->
    <?php
            if(isset($_POST['submit'])){
                $email=$_POST["email"];
                $password=$_POST["password"];
                $sql="SELECT * FROM users WHERE email='$email' AND password='$password' ";
                $res=$db->query($sql);    
                if($res->num_rows>0)
                { 
                    $row=$res->fetch_assoc(); 
                    $_SESSION['success']=" You have successfully Logged in";
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $row['user_id'];  
                    $_SESSION["username"] = $row['first_name'];
                    if($row['admin']==1){
                        $_SESSION['admin']=1;
                        echo "<script>window.open('user_home.php','_self')</script>";
                    }
                    else{
                        $_SESSION['admin']=0;
                        echo "<script>window.open('user_home.php','_self')</script>";
                    }  
                }
                else
                {
                    $_SESSION['error']="E-mail id and Password dosen't match";
                }
            }
        ?>

        <!-- This is Navbar -->
        <?php include "navbar.php"; ?>
        <!-- Content starts from here -->
        <div class="main-content">
        <!-- This is to display the error message if occured -->
        <?php    
                if(isset($_SESSION['error']))
                {
            ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $_SESSION['error'] ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
                }
                unset($_SESSION['error']);
            ?>
            <div class="card text center container col-6 mt-5 mb-4" id="login">
                <div class="card-body" id="login_content">
                    <!-- Default form login -->
                    <form class="text-center p-4 " action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">

                        <h3 class="h4 mb-4">Sign in</h3>

                        <!-- Email -->
                        <input type="email" name="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail" required>

                        <!-- Password -->
                        <input type="password" name="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password" required>

                        <!-- Sign in button -->
                        <button class="btn btn-dark btn-block my-4" type="submit" name="submit" style="border-radius:20px;">Sign in</button>

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