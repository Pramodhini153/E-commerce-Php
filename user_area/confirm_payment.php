<?php
include('../includes/db.php');
session_start();
if(isset($_GET['order_id'])){
    $order_id=$_GET['order_id'];
    $payment_query="SELECT * from user_orders where order_id=$order_id";
    $res_payment_query=mysqli_query($con,$payment_query);
    $row_data=mysqli_fetch_assoc($res_payment_query);
    $invoice_number=$row_data['invoice_no'];
    $amount=$row_data['amount_due'];
}
if(isset($_POST['confirm_payment'])){
    $invoice_number=$_POST['invoice_no'];
    $amount=$_POST['amount'];
    $payment_mode=$_POST['payment_mode'];
    $confirm_payment_qry="INSERT into user_payments (order_id,invoice_no,amount,payment_mode,date)
     values ($order_id,$invoice_number,$amount,'$payment_mode',NOW())";
    $res_confirm_payment_qry=mysqli_query($con,$confirm_payment_qry);
    if($res_confirm_payment_qry){
        echo "<h3 class='text-center text-success my-2'>Your Payment has been done succesfully</h3>";
        echo "<script>window.open('profile.php','_self')</script>";
    }
    $update_orders="UPDATE user_orders set order_status='Complete' where order_id=$order_id";
    $res_update_orders=mysqli_query($con,$update_orders);
    $delete_order_pendings="DELETE from orders_pending where order_id=$order_id";
    $res_delete_order_pendings=mysqli_query($con,$delete_order_pendings);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="container my-5">
        <h1 class="text-center text-info">Confirm Payment</h1>
        <form action="" method="post">
            <div class="form-outline mt-4 mb-3 text-center w-50 m-auto">
                <input type="text" class="form-control w-50 m-auto" name="invoice_no" value="<?php echo $invoice_number ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <label for="" style="font_weight:bold;">Amount</label>
                <input type="text" class="form-control w-50 mt-2 m-auto" name="amount" value="<?php echo $amount ?>">
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto">
                <select name="payment_mode" class="form-select w-50 m-auto">
                    <option class="py-1 bg-info text-light">Select Payment Mode</option>
                    <option class="py-1 bg-info text-light">UPI</option>
                    <option class="py-1 bg-info text-light">Net Banking</option>
                    <option class="py-1 bg-info text-light">Paypal</option>
                    <option class="py-1 bg-info text-light">Cash on Delivery</option>
                    <option class="py-1 bg-info text-light">Pay Offline</option>
                </select>
            </div>
            <div class="form-outline my-4 text-center w-50 m-auto ">
                <input type="submit" class="bg-info px-3 py-2 border-0" name="confirm_payment" value="Confirm">
            </div>
        </form>
    </div>
</body>
</html>