<?php
if(isset($_GET['delete_order'])){
    $order_id=$_GET['delete_order'];
    $delete_order_qry="DELETE from user_orders where order_id=$order_id";
    $res_order_qry=mysqli_query($con,$delete_order_qry);
    if($res_order_qry){
        echo "<script>alert('Order deleted succesfully...')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}
?>