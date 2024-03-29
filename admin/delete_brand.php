<?php
if(isset($_GET['delete_brand'])){
    $delete_brand_id=$_GET['delete_brand'];
    $delete_brand_qry="DELETE from brands where brand_id=$delete_brand_id";
    $res_delete_brand_qry=mysqli_query($con,$delete_brand_qry);
    if($res_delete_brand_qry){
        echo "<script>alert('Brand deleted succesfully...')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}
?>