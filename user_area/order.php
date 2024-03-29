<?php
include("../includes/db.php");
include("../functions/com_fn.php");
if(isset($_GET['user_id'])){
    $user_id=$_GET['user_id'];
}
//getting total price and items in cart
$get_ip_address=getIPAddress() ;
$total_price=0;
$cart_items_qry="SELECT * from cart_details where ip_address='$get_ip_address'";
$cart_items_qry_res=mysqli_query($con,$cart_items_qry);
$count_items=mysqli_num_rows($cart_items_qry_res);
$invoice_number=mt_rand();
$status='pending';
while($row_item_data=mysqli_fetch_assoc($cart_items_qry_res)){
    $product_id=$row_item_data['product_id'];
    $cart_items_product_qry="SELECT * from products where product_id=$product_id";
    $cart_items_product_qry_res=mysqli_query($con,$cart_items_product_qry);
    while($row_product_price=mysqli_fetch_assoc($cart_items_product_qry_res)){
        $product_price=array($row_product_price['product_price']);
        $product_values=array_sum($product_price);
        $total_price+=$product_values;
    }
}
//'getting quantity
$get_cart="SELECT * from cart_details";
$res_get_cart=mysqli_query($con,$get_cart);
$row_cart_data=mysqli_fetch_array($res_get_cart);
$quantity=$row_cart_data['quantity'];
if($quantity==0){
    $quantity=1;
    $subtotal=$total_price;
}
else{
    $quantity=$quantity;
    $subtotal=$total_price*$quantity;
}

//Insert into userorder table
$insert_orders="INSERT into user_orders (user_id,amount_due,invoice_no,total_products,order_date,order_status)
 values ($user_id,$subtotal,$invoice_number,$count_items,NOW(),'$status')";
$res_insert_orders=mysqli_query($con,$insert_orders);
if($res_insert_orders){
    echo "<script>alert('Orders are submitted succesfully...')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
} 
//insert into orderpending table
$insert_pending_orders="INSERT into orders_pending (order_id,user_id,invoice_no,product_id,quantity,order_status)
 values ($order_id,$user_id,$invoice_number,$product_id,$quantity,'$status')";
$res_insert_pending_orders=mysqli_query($con,$insert_pending_orders);
if($res_insert_pending_orders){
    echo "<script>alert('Orders are submitted succesfully...')</script>";
    echo "<script>window.open('profile.php','_self')</script>";
}
//delete items from cart
$empty_cart_qry="DELETE from cart_details where ip_address='$get_ip_address'";
$res_empty_cart_qry=mysqli_query($con,$empty_cart_qry);
?>

