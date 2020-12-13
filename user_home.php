<?php
include "db.php";
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
        #add-list{
            padding-top: 50px;
            justify-content: center;
        }
        .main-content{
            min-height: 100vh;
        }
        #page{
            padding-top: 50px;
            justify-content: center;
        }
    </style>
</head>
    <body>
        <!-- This is Navbar -->
        <?php include "navbar.php"; ?>
        <!-- Content starts from here -->
        <div class="main-content">
            <?php    
                if(isset($_SESSION['success']))
                {
            ?>
                <div class="alert alert-success" role="alert">
                <?php echo $_SESSION['success'] ?>
                </div>
            <?php
                }
                unset($_SESSION['success']);
            ?>
        
            <div class="container pt-4">
                <p class="display-4 text-center text-white">Welcome, <u class="font-weight-bold"><?php echo $_SESSION['username'] ?></u></p><br>
                <?php 
                    if($_SESSION['admin']==1){
                ?>
                <h5 class="text-center text-white">You are a admin, <a href="admin_home.php" class="text-white">view admin page</a></h5>
                <?php
                    }
                ?>
            </div>
            <div class="container">
                <form action="add_list.php" method="post">
                        <div class="input-group" id="add-list">
                            <input type="text" name="todo" class="form-control col-lg-6 shadow p-3 mb-5" placeholder="Add Todo Task" required>
                            <span class="input-group-btn">
                                <button class="btn btn-secondary" name="add_todo" type="submit">Add</button>
                            </span>
                        </div>
                    </form>
            </div>
            <?php
                if (isset($_GET['pageno'])) {
                    $pageno = $_GET['pageno'];
                } else {
                    $pageno = 1;
                }
                $id = $_SESSION['id'];
                $no_of_records_per_page = 4;
                $offset = ($pageno-1) * $no_of_records_per_page;
                $total_pages_sql = "SELECT COUNT(*) FROM list WHERE user_id=$id";
                $result = mysqli_query($db,$total_pages_sql);
                $total_rows = mysqli_fetch_array($result)[0];
                $total_pages = ceil($total_rows / $no_of_records_per_page);
                $sql = "SELECT id, user_name, todo, created_at FROM list WHERE user_id=$id LIMIT $offset, $no_of_records_per_page";
                $res=$db->query($sql);
                if($res->num_rows>0){
                    $i=0;
                    while($row=$res->fetch_assoc()){
                        $i++;
                        echo "<div class='card text center container col-6 mt-1 mb-4 p-4' id='login'>";
                        echo "<div class='card-bod'y id='login_content'>";
                        echo "<form action='remove_todo.php' method='post'>";
                        echo "<input type='hidden' name='todo_id' value='{$row["id"]}'>";
                        echo "<button class='btn btn-link float-right' type='submit' name='remove' style='font-size:46px;' aria-hidden='true'>&times;</button>";
                        echo "</form>";
                        echo "<h5>{$row["todo"]}</h5>";
                        echo "<h6>Posted by : {$row["user_name"]}</h6>";
                        echo "<h6 class='text-muted'>{$row["created_at"]}</h6>";
                        echo "</div>";
                        echo "</div>";
                    }
                }
                else{
                    echo "<div class='container text-center text-white'><h4>There no tasks to do, List is empty.</h4></div>";
                }
            ?>
            <ul class="pagination container pt-4 <?php if($total_rows < 5 ){ echo 'd-none'; } ?>" id="page">
                <li><a href="?pageno=1" class="btn btn-light"><< First</a></li>
                <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                    <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="btn btn-light ml-3">< Prev</a>
                </li>
                <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
                    <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>" class="btn btn-light ml-3">Next ></a>
                </li>
                <li><a href="?pageno=<?php echo $total_pages; ?>" class="btn btn-light ml-3">Last >></a></li>
            </ul>
        </div>
        <?php include('footer.php') ?>


    </body>
</html>