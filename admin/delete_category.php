<?php
if(isset($_GET['delete_category'])){
    $delete_category_id=$_GET['delete_category'];
    $delete_category_qry="DELETE from categories where category_id=$delete_category_id";
    $res_delete_category_qry=mysqli_query($con,$delete_category_qry);
    if($res_delete_category_qry){
        echo "<script>alert('Category deleted succesfully...')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}
?>