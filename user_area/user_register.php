<?php
include('../includes/db.php');
include('../functions/com_fn.php');
if(isset($_POST['user_register'])){
    $user_email=$_POST['user_email'];
    $user_username=$_POST['user_username'];
    $user_password=$_POST['user_password'];
    $hash_password=password_hash($user_password,PASSWORD_DEFAULT);
    $user_confirm_password=$_POST['user_confirm_password'];
    $user_address=$_POST['user_address'];
    $user_mobile=$_POST['user_mobile'];
    $user_ip=getIPAddress();
    $user_image=$_FILES['user_image']['name'];
    $temp_user_image=$_FILES['user_image']['tmp_name'];
    // //username 
    // $select_uname_query="SELECT * from user_table where user_name='$user_username' or user_email!='$user_email'";
    // $res_select_uname_query=mysqli_query($con,$select_uname_query);
    // $row_uname_count=mysqli_num_rows($res_select_uname_query);
    // //email
    // $select_email_query="SELECT * from user_table where user_name!='$user_username' or user_email='$user_email'";
    // $res_select_email_query=mysqli_query($con,$select_email_query);
    // $row_email_count=mysqli_num_rows($res_select_email_query);
    // //both username and email
    $select_query="SELECT * from user_table where user_name='$user_username' or user_email='$user_email'";
    $res_select_query=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($res_select_query);
    if($row_count>0){
        echo "<script>alert('Username and email already exists')</script>";
    }
    else if($user_password!=$user_confirm_password){
        echo "<script>alert('Password don't match')</script>";
    }
    // else if($row_uname_count>0){
    //     echo "<script>alert('Username already exists')</script>";
    // }
    // else if($row_email_count>0){
    //     echo "<script>alert('email already exists')</script>";
    // }
    else{
    move_uploaded_file($temp_user_image,"./user_images/$user_image");
    $user_register_query="INSERT into user_table(user_name,user_email,user_password,user_image,user_ip,user_address,user_mobile)
    values('$user_username','$user_email','$hash_password','$user_image','$user_ip','$user_address','$user_mobile')";
    $res_user_register_query=mysqli_query($con,$user_register_query);
    if($res_user_register_query){
        echo "<script>alert('Registered successfully...')</script>";
        echo "<script>window.open('user_login.php','_self')</script>";
    }
    
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
    <div class="container-fluid my-3">
        <h2 class="text-center">New User Registration</h2>
        <div class="row d-flex align-items-center justify-content-center">

        <div class="col-lg-12 col-xl-6">
        <form action="" class="" method="post" enctype="multipart/form-data" >
        <div class="form-outline mb-4">
            <label for="user_username" class="form-label">User Name</label>
            <input type="text" class="form-control" id ="user_username" name="user_username" placeholder="Enter your name">
        </div>
        <div class="form-outline mb-4">
            <label for="user_email" class="form-label">UserEmail</label>
            <input type="text" class="form-control" id ="user_email" name="user_email" placeholder="Enter your email"> 
        </div>
        <div class="form-outline mb-4">
            <label for="user_image" class="form-label">User Image</label>
            <input type="file" class="form-control" id ="user_image" name="user_image" > 
        </div>
        <div class="form-outline mb-4">
            <label for="user_password" class="form-label">Password</label>
            <input type="text" class="form-control" id ="user_password" name="user_password" placeholder="Enter your password"> 
        </div>
        <div class="form-outline mb-4">
            <label for="user_password" class="form-label">Confirm Password</label>
            <input type="text" class="form-control" id ="user_password" name="user_confirm_password" placeholder="Enter your password"> 
        </div>
        <div class="form-outline mb-4">
            <label for="user_address" class="form-label">Address</label>
            <input type="text" class="form-control" id ="user_address" name="user_address" placeholder="Enter your address"> 
        </div>
        <div class="form-outline mb-4">
            <label for="user_mobile" class="form-label">Contact</label>
            <input type="text" class="form-control" id ="user_mobile" name="user_mobile" placeholder="Enter your mobile number"> 
        </div>
        <div>
            <input type="submit" class="bg-info px-3 py-2 border-0" name="user_register" value="Register">
            <p class="mt-3 small fw-bold">Already have an account ? <a href="user_login.php" class="text-danger">Login</a></p>
        </div>
        </form>
    </div>
    </div>
    </div>
    
</body>
</html>