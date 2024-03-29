<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="container my-5">
        <h1 class="text-center text-danger">Deleting Account</h1>
        <form action="" method="post">
            <div class="form-outline my-4 m-auto">
                <input type="submit" class="form-control w-50 m-auto" name="delete_account" value="Delete account">
            </div>
            <div class="form-outline my-4 m-auto">
                <input type="submit" class="form-control w-50 m-auto" name="dont_delete_account" value="Don't Delete account">
            </div>
        </form>
    <?php
    if(isset($_POST['delete_account'])){
        $uname=$_SESSION['user_username'];
        $delete_account_qry="DELETE from user_table where user_name='$uname'";
        $res_delete_account_qry=mysqli_query($con,$delete_account_qry);
        if($res_delete_account_qry){
            session_destroy();
            echo "<script>alert('Account Deleted Successfuly...')</script>";
            echo "<script>window.open('../index.php','_self')</script>";
        }
    }
    if(isset($_POST['dont_delete_account'])){
        echo "<script>window.open('profile.php','_self')</script>";
    }
    ?>
</div>
</body>
</html>