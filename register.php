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
            background-image: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.2)),url('src/images/bg-4.jpg');
         }
        #login{
            background: rgba(255, 255, 255, 0.8);
        }
    </style>
</head>
    <body>
        <!-- The Register code -->
        <?php
            if(isset($_POST['submit'])){
                $first_name=$_POST["first_name"];
                $second_name=$_POST["second_name"];
                $email=$_POST["email"];
                $password=$_POST["password"];
                $phone_number=$_POST["phone_number"];
                $dob=$_POST["dob"];
                $sql="INSERT INTO users(first_name,second_name,email,password,phone_number,dob)
                    VALUES ('{$first_name}','{$second_name}','{$email}','{$password}','{$phone_number}','{$dob}')";
                    
                if($db->query($sql))
                { 
                    $_SESSION['success']=" You have successfully Logged in";
                    $_SESSION["loggedin"] = true;
                    $_SESSION["id"] = $row['user_id'];  
                    $_SESSION["username"] = $row['first_name'];
                    $_SESSION["admin"] = 0;
                    echo "<script>window.open('user_home.php','_self')</script>";
                }
                else
                {
                    echo "<p class='success'>Registration Failed.</p>";
                }
            }
        ?>
        <!-- This is Navbar -->
        <?php include "navbar.php"; ?>
        <!-- Content starts from here -->
        <div class="card text center container col-6 mt-5 mb-4" id="login">
            <div class="card-body" id="login_content">
                <!-- Default form register -->
                <form class="text-center p-5" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">

                    <p class="h4 mb-4">Sign up</p>

                    <div class="form-row mb-4">
                        <div class="col">
                            <!-- First name -->
                            <input type="text" id="defaultRegisterFormFirstName" name="first_name" class="form-control" placeholder="First name">
                        </div>
                        <div class="col">
                            <!-- Last name -->
                            <input type="text" id="defaultRegisterFormLastName" name="second_name" class="form-control" placeholder="Last name">
                        </div>
                    </div>

                    <!-- E-mail -->
                    <input type="email" id="defaultRegisterFormEmail" name="email" class="form-control mb-4" placeholder="E-mail">

                    <!-- Password -->
                    <input type="password" id="defaultRegisterFormPassword" name="password" class="form-control mb-4" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock">
                    <!-- Phone number -->
                    <input type="text" id="defaultRegisterPhonePassword" name="phone_number" class="form-control mb-4" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock">
                    
                    <small class="float-left text-muted">DOB</small>
                    <input type="date" placeholder="Date" id="birthday" class="form-control textbox-n" name="dob" onfocus="(this.type='date')" onblur="(this.type='text')">
                    

                    <!-- Sign up button -->
                    <button class="btn btn-dark btn-block my-4" type="submit" name="submit" style="border-radius:20px;">Register</button>

                </form>
                <!-- Default form register -->
                <!-- Register -->
                <p class="text-center">Already Registered?
                        <a href="index.php">Login</a>
                    </p>
            </div>
        </div>
        <?php include('footer.php') ?>


    </body>
</html>