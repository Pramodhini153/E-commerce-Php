<?php
include("../includes/db.php");
include("../functions/com_fn.php");
$user_ip=getIPAddress();
$get_user_query="SELECT * from user_table where user_ip='$user_ip'";
$get_user_query_result=mysqli_query($con,$get_user_query);
$get_user_data=mysqli_fetch_assoc($get_user_query_result);
$get_user_id=$get_user_data['user_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        .paymentimg{
            width:90%;
            margin-bottom:50px;
            /* margin-left:150px; */
            /* margin:auto; */
            /* display:block; */
        }
        .payment{
            text-decoration:none;
        }
        .one{
            margin-left:100px;
            margin-top:20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center text-info">Payment Options</h1>
        <div class="row d-flex justify-content-center align-items-center one">
            <div class="col-md-6">
                <a href="https://www.paypal.com" target="_blank"><img src="../images/upipayment.jpeg" class="paymentimg" alt=""></a>
            </div>
            <div class="col-md-6">
                <a class="payment" href="order.php?user_id=<?php echo $get_user_id ?>"><h2>Offline Payment</h2></a>
            </div>
        </div>
    </div>
</body>
</html>