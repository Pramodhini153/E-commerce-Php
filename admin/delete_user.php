<?php
if(isset($_GET['delete_user'])){
    $user_id=$_GET['delete_user'];
    $delete_user_qry="DELETE from user_table where user_id=$user_id";
    $res_user_qry=mysqli_query($con,$delete_user_qry);
    if($res_user_qry){
        echo "<script>alert('User deleted succesfully...')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}
?>