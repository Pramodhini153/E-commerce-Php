<?php
if(isset($_GET['delete_payment'])){
    $order_id=$_GET['delete_payment'];
    $delete_payment_qry="DELETE from user_orders where order_id=$order_id";
    $res_payment_qry=mysqli_query($con,$delete_payment_qry);
    if($res_payment_qry){
        echo "<script>alert('Payment deleted succesfully...')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}
?>