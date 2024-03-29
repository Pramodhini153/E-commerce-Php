<?php
if(isset($_GET['delete_product'])){
    $delete_product=$_GET['delete_product'];
    $delete_product_qry="DELETE from products where product_id=$delete_product";
    $res_delete_product_qry=mysqli_query($con,$delete_product_qry);
    if($res_delete_product_qry){
        echo "<script>alert('Product deleted succesfully...')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}

?>