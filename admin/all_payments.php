<h3 class="text-center text-success">All Payments</h3>
<!-- products table -->
<table class="table table-bordered mt-5">
    
<?php
$payments_qry="SELECT * from user_payments";
$res_payments_qry=mysqli_query($con,$payments_qry);
$payments_count=mysqli_num_rows($res_payments_qry);
if($payments_count==0){
    echo "<h2 class='text-danger text-center mt-5'>No Payments yet...</h2>";
}
else{
    echo "<thead class='bg-info'>
    <tr>
        <th>SI No</th>
        <th>Invoice No.</th>
        <th>Amount</th>
        <th>Payment Mode</th>
        <th>Order Date</th>
        <th>Delete</th>
    </tr>
</thead>";
$num=0;
while($payments_data=mysqli_fetch_assoc($res_payments_qry)){
    $order_id=$payments_data['order_id'];
    $payment_id=$payments_data['payment_id'];
    $amount=$payments_data['amount'];
    $invoice_no=$payments_data['invoice_no'];
    $order_date=$payments_data['date'];
    $payment_mode=$payments_data['payment_mode'];
    $num+=1;
    ?>
    <tbody class='bg-secondary text-center text-light'>
        <td><?php echo $num; ?></td>
        <td><?php echo $invoice_no; ?></td>
        <td><?php echo $amount; ?></td>
        <td><?php echo $payment_mode; ?></td>
        <td><?php echo $order_date; ?></td>
        <td><a href='./index.php?delete_payment=<?php echo $payment_id; ?>' class='text-light'
        type="button"  data-toggle="modal" data-target="#exampleModal">
        <i class='fa-solid fa-trash'></i></a></td>
        </tbody>
<?php      
}
}
?>

    
</table>
<!-- Launch demo modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <h4>Are you sure you want to delete this?</h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?all_orders?"
        class="text-light text-decoration-none">NO</a></button>
        <button type="button" class="btn btn-primary"><a href="./index.php?delete_payment=<?php echo $payment_id; ?>"
        class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>