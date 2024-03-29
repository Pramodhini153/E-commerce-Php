<?php
include("../includes/db.php");
include("../functions/com_fn.php");
@session_start();
if(isset($_POST['login'])){
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    $select_user_query="SELECT * from user_table where user_name='$user_username'";
    $select_user_query_result=mysqli_query($con,$select_user_query);
    $row_data=mysqli_fetch_assoc($select_user_query_result);
    $row_num=mysqli_num_rows($select_user_query_result);
    $user_ip=getIPAddress();
    // $select_cart="SELECT * from cart_details where user_ip='$user_ip'";
    // $select_cart_result=mysqli_query($con,$select_user_query);
    // // $row_data=mysqli_fetch_assoc($select_cart_result);
    // $row_num_cart=mysqli_num_rows($select_cart_result);
    if($row_num>0){
        $_SESSION['user_username']=$user_username;
        if(!password_verify($user_password,$row_data['user_password'])){
            echo "<script>alert('Invalid Credentials...')</script>";
        }
        else{
            if($row_num==1){
                // $_SESSION['user_username']=$user_username;
                echo "<script>alert('Login successful...')</script>";
                echo "<script>window.open('../index.php','_self')</script>";

            }
            echo "<script>alert('Login successful...')</script>";
        }
    }
    else{
        echo "<script>alert('Invalid Credentials...')</script>";
    }

}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid my-3 mt-5">
        <h2 class="text-center">User Login</h2>
        <div class="row d-flex align-items-center justify-content-center">

        <div class="col-lg-12 col-xl-6">
        <form action="" class="" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="form-outline mb-4">
            <label for="user_username" class="form-label">User Name</label>
            <input type="text" class="form-control" id ="user_username" name="user_username" placeholder="Enter your name">
        </div>
        <div class="form-outline mb-4">
            <label for="user_password" class="form-label">Password</label>
            <input type="text" class="form-control" id ="user_password" name="user_password" placeholder="Enter your password"> 
        </div>
        <div>
            <input type="submit" class="bg-info px-3 py-2 border-0" name="login" value="Login">
            <p class="mt-3 small fw-bold">Don't have an account ? <a href="user_register.php" class="text-danger">Register</a></p>
        </div>
        </form>
    </div>
    </div>
    </div>
    
</body>
</html>