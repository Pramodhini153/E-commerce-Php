<?php
include('../includes/db.php');
include('../functions/com_fn.php');
if(isset($_POST['register'])){
    $admin_name=$_POST['admin_name'];
    $admin_email=$_POST['admin_email'];
    $admin_password=$_POST['password'];
    $hash_password=password_hash($admin_password,PASSWORD_DEFAULT);
    $admin_confirm_password=$_POST['confirm_password'];
    $select_query="SELECT * from admin_table where admin_name='$admin_name' or admin_email='$admin_email'";
    $res_select_query=mysqli_query($con,$select_query);
    $row_count=mysqli_num_rows($res_select_query);
    if($row_count>0){
        echo "<script>alert('Admin Name and email already exists')</script>";
    }
    else if($admin_password!=$admin_confirm_password){
        echo "<script>alert('Password don't match')</script>";
    }
    else{
    $admin_register_query="INSERT into admin_table(admin_name,admin_email,admin_password)
    values('$admin_name','$admin_email','$hash_password')";
    $res_admin_register_query=mysqli_query($con,$admin_register_query);
    if($res_admin_register_query){
        echo "<script>alert('Registered successfully...')</script>";
        echo "<script>window.open('admin_login.php','_self')</script>";
    }
    
}

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container">
    <h2 class="text-center mt-4">Admin Registration</h2>
    <div class="row d-flex justify-content-center align-items-center gap-4">
        <div class="col-lg-6">
            <img src="../images/admin_registration.png" alt="">
        </div>
        <div class="col-lg-6 col-xl-5">
        <form action="" method="post">
        <div class="form-outline m-auto my-4">
            <label for="admin_name" class="form-label">Admin Name</label>
            <input type="text" id="admin_name" name="admin_name" class="form-control" required="required"
            placeholder="Enter Name">
        </div>
        <div class="form-outline m-auto mb-4">
            <label for="admin_email" class="form-label">Admin Email</label>
            <input type="text" id="admin_email" name="admin_email" class="form-control" required="required"
            placeholder="Enter Email">
        </div>
        <div class="form-outline  m-auto mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="text" id="password" name="password" class="form-control" required="required"
            placeholder="Enter password">
        </div>
        <div class="form-outline  m-auto mb-4">
            <label for="confirm_password" class="form-label">confirm_password</label>
            <input type="text" id="confirm_password" name="confirm_password" class="form-control" required="required"
            placeholder="Re-enter the password">
        </div>
        <div class="mb-3">
            <input type="submit" id="register" name="register" class="bg-info px-3 py-2 border-0" 
            value="Register" required="required">
        </div>
        <p class="small fw-bold mt-2">Already have an account <a class="link-danger" href="admin_login.php"> Login</a></p>
        </div>
</form>
    </div>
    </div>
</body>
</html>