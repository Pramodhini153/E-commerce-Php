<?php
if(isset($_GET['edit_account'])){
    $username=$_SESSION['user_username'];
    $user_qry="SELECT * from user_table where user_name='$username'";
    $res_user_qry=mysqli_query($con,$user_qry);
    $row_user_data=mysqli_fetch_assoc($res_user_qry);
    $user_id=$row_user_data['user_id'];
    $user_name=$row_user_data['user_name'];
    $user_email=$row_user_data['user_email'];
    $user_address=$row_user_data['user_address'];
    $user_mobile=$row_user_data['user_mobile'];
}
if(isset($_POST['user_update'])){
    $update_id=$user_id;
    $user_username=$_POST['user_username'];
    $user_email=$_POST['user_email'];
    $user_address=$_POST['user_address'];
    $user_mobile=$_POST['user_mobile'];
    $user_img=$_FILES['user_image']['name'];
    $user_tmp_img=$_FILES['user_image']['tmp_name'];
    move_uploaded_file($user_tmp_img,"./user_images/$user_img");
    $update_qry="UPDATE user_table set user_name='$user_username',user_email='$user_email',user_image='$user_img',
    user_address='$user_address',user_mobile=$user_mobile where user_id=$update_id";
    $res_update_qry=mysqli_query($con,$update_qry);
    if($res_update_qry){
        echo "<script>alert('Data Updated Succesfully...')</script>";
        echo "<script>window.open('user_logout.php','_self')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3 class="text-center text-success mb-4">Edit Account</h3>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline mb-4">
            <input type="text" value="<?php echo $user_name ?>" class="form-control w-50 m-auto" name="user_username">
        </div>
        <div class="form-outline mb-4">
            <input type="email" value="<?php echo $user_email ?>" class="form-control w-50 m-auto" name="user_email">
        </div>
        <div class="form-outline mb-4 d-flex w-50 m-auto">
            <input type="file" class="form-control" name="user_image">
            <img src='./user_images/<?php echo $user_img ?>' alt='profile' class='edit_img'>
        </div>
        <div class="form-outline mb-4">
            <input type="text" value="<?php echo $user_address ?>" class="form-control w-50 m-auto" name="user_address">
        </div>
        <div class="form-outline mb-4">
            <input type="number" value="<?php echo $user_mobile ?>" class="form-control w-50 m-auto" name="user_mobile">
        </div>
        <input type="submit" value="Update" class="bg-info py-2 px-3 border-0" name="user_update">
    </form>
</body>
</html>