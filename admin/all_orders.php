<h3 class="text-center text-success">All Orders</h3>
<!-- products table -->
<table class="table table-bordered mt-5">
    
<?php
$orders_qry="SELECT * from user_orders";
$res_orders_qry=mysqli_query($con,$orders_qry);
$orders_count=mysqli_num_rows($res_orders_qry);
if($orders_count==0){
    echo "<h2 class='text-danger text-center mt-5'>No Orders yet...</h2>";
}
else{
    echo "<thead class='bg-info'>
    <tr>
        <th>SI No</th>
        <th>Due Amount</th>
        <th>Invoice No.</th>
        <th>Total Products</th>
        <th>Order Date</th>
        <th>Status</th>
        <th>Delete</th>
    </tr>
</thead>";
$num=0;
while($orders_data=mysqli_fetch_assoc($res_orders_qry)){
    $order_id=$orders_data['order_id'];
    $user_id=$orders_data['user_id'];
    $amount_due=$orders_data['amount_due'];
    $invoice_no=$orders_data['invoice_no'];
    $total_products=$orders_data['total_products'];
    $order_date=$orders_data['order_date'];
    $order_status=$orders_data['order_status'];
    $num+=1;
    ?>
    <tbody class='bg-secondary text-center text-light'>
        <td><?php echo $num; ?></td>
        <td><?php echo $amount_due; ?></td>
        <td><?php echo $invoice_no; ?></td>
        <td><?php echo $total_products; ?></td>
        <td><?php echo $order_date; ?></td>
        <td><?php echo $order_status; ?></td>
        <td><a href='./index.php?delete_order=<?php echo $order_id; ?>' class='text-light'
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
        <button type="button" class="btn btn-primary"><a href="./index.php?delete_order=<?php echo $order_id; ?>"
        class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>