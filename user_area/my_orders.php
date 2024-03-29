<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $username=$_SESSION['user_username'];
        $user_qry="SELECT * from user_table where user_name='$username'";
        $res_user_qry=mysqli_query($con,$user_qry);
        $row_user_data=mysqli_fetch_assoc($res_user_qry);
        $user_id=$row_user_data['user_id'];
        $my_orders_qry="SELECT * from user_orders where user_id=$user_id";
        $res_my_orders_qry=mysqli_query($con,$my_orders_qry);
        $row_num=mysqli_num_rows($res_my_orders_qry);
    if($row_num==0){
        echo "<h2 class='mt-5 text-center text-danger'>No Orders yet...</h2>";
    }
    else{
        echo"
    <h3>All my orders</h3>
    <table class='table table-bordered'>
        <thead class='bg-info'>
            <tr>
                <th>Sl no</th>
                <th>Amount Due</th>
                <th>Total Products</th>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Complete/Incomplete</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class='bg-secondary text-light'>";
    }
        ?>
            <?php
            $number=1;
            while($row_orders_data=mysqli_fetch_assoc($res_my_orders_qry)){
                $order_id=$row_orders_data['order_id'];
                $amount_due=$row_orders_data['amount_due'];
                $total_products=$row_orders_data['total_products'];
                $invoice_number=$row_orders_data['invoice_no'];
                $order_date=$row_orders_data['order_date'];
                $order_status=$row_orders_data['order_status'];
                if($order_status=='pending'){
                    $order_status='Incomplete';
                }
                else{
                    $order_status='Complete';
                }
                echo "<tr>
                <td>$number</td>
                <td>$amount_due</td>
                <td>$total_products</td>
                <td>$invoice_number</td>
                <td>$order_date</td>
                <td>$order_status</td>";
                if($order_status=='Complete'){
                    echo "<td>Paid</td>";
                }
                else{
                    echo "<td><a href='confirm_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td>
                    </tr>";
                }
            $number++;  
        }
    ?>
        </tbody>
    </table>
</body>
</html>