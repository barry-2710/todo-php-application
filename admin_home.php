<?php
include("db.php");
include("auth.php");
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
        .main-content{
            min-height: 100vh;
        }
        #login{
            background: rgba(255, 255, 255, 0.8);
        }
    </style>
</head>
    <body>
     <?php $result = mysqli_query($db,"SELECT COUNT(*) FROM users"); 
     $count = mysqli_fetch_array($result)[0];
     ?>
        <!-- This is Navbar -->
        <?php include "navbar.php"; ?>
        <!-- Content starts from here -->
        <div class="main-content">
            <div class="container pt-4">
                <p class="display-4 text-center text-white">Admin Dashboard</p>
                <h5 class="text-white text-center">Go back to <a href="user_home.php" class="text-white">Home</a></h5>
            </div>
                    <h2 class="display-5 text-center text-white pt-3">User List [<?php echo $count; ?>]</h2>
                <table class="table container" id="login">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email </th>
                        <th scope="col">Phone </th>
                        <th scope="col">DOB</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $sql = "SELECT * FROM users";
                            $res=$db->query($sql);
                            if($res->num_rows>0){
                                $i=0;
                                while($row=$res->fetch_assoc()){
                                    $name = $row["first_name"]." ".$row["second_name"];
                                    $i++;
                                    echo "<tr>";
                                    echo "<th scope='row'>{$i}</th>";
                                    echo "<td>{$name}</td>";
                                    echo "<td>{$row["email"]}</td>";
                                    echo "<td>{$row["phone_number"]}</td>";
                                    echo "<td>{$row["dob"]}</td>";
                                }
                            }
                        ?>
                    </tbody>
                </table>
        </div>
        <?php include('footer.php') ?>


    </body>
</html>