<?php
include("../includes/db.php");
include("../functions/com_fn.php");
session_start();
if(isset($_POST['login'])){
    $admin_name=$_POST['admin_name'];
    $admin_password=$_POST['password'];
    $select_admin_query="SELECT * from admin_table where admin_name='$admin_name'";
    $select_admin_query_result=mysqli_query($con,$select_admin_query);
    $row_data=mysqli_fetch_assoc($select_admin_query_result);
    $row_num=mysqli_num_rows($select_admin_query_result);
    if($row_num>0){
        if(password_verify($admin_password,$row_data['admin_password'])){
                $_SESSION['admin_name']=$admin_name;
                echo "<script>alert('Login successful...')</script>";
                echo "<script>window.open('./index.php','_self')</script>";
        }
        else{
            echo "<script>alert('Invalid Credentials...')</script>";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
    <h2 class="text-center mt-4">Admin Login</h2>
    <div class="row d-flex justify-content-center align-items-center gap-4">
        <div class="col-lg-6 col-xl-5 mt-3">
            <img src="../images/admin_login.png" height='90%' width="90% alt="">
        </div>
        <div class="col-lg-6 col-xl-5">
        <form action="" method="post">
        <div class="form-outline m-auto my-4">
            <label for="admin_name" class="form-label">Admin Name</label>
            <input type="text" id="admin_name" name="admin_name" class="form-control" required="required"
            placeholder="Enter Name">
        </div>
        <div class="form-outline  m-auto mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="text" id="password" name="password" class="form-control" required="required"
            placeholder="Enter password">
        </div>
        <p class="small fw-bold mt-2"><a class="link-danger" href="admin_login.php">Forgot Password?</a></p>
        <div class="mb-3">
            <input type="submit" id="login" name="login" class="bg-info px-3 py-2 border-0" 
            value="Login" required="required">
        </div>
        <p class="small fw-bold mt-2">Don't have an account? <a class="link-danger" href="admin_registration.php"> Register</a></p>
        </div>
</form>
    </div>
    </div>
</body>
</html>