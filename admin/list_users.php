<h3 class="text-center text-success">All Payments</h3>
<!-- products table -->
<table class="table table-bordered mt-5">
    
<?php
$users_qry="SELECT * from user_table";
$res_users_qry=mysqli_query($con,$users_qry);
$users_count=mysqli_num_rows($res_users_qry);
if($users_count==0){
    echo "<h2 class='text-danger text-center mt-5'>No Users yet...</h2>";
}
else{
    echo "<thead class='bg-info'>
    <tr>
        <th>SI No</th>
        <th>User Name</th>
        <th>User Email</th>
        <th>User Image</th>
        <th>User Address</th>
        <th>User Mobile</th>
        <th>Delete</th>
    </tr>
</thead>";
$num=0;
while($users_data=mysqli_fetch_assoc($res_users_qry)){
    $user_id=$users_data['user_id'];
    $user_name=$users_data['user_name'];
    $user_email=$users_data['user_email'];
    $user_image=$users_data['user_image'];
    $user_address=$users_data['user_address'];
    $user_mobile=$users_data['user_mobile'];
    $num+=1;
    ?>
    <tbody class='bg-secondary text-center text-light'>
        <td><?php echo $num; ?></td>
        <td><?php echo $user_name; ?></td>
        <td><?php echo $user_email; ?></td>
        <td><?php echo "<img src='../images/$user_image' height='80' width='80' alt=''>"; ?></td>
        <td><?php echo $user_address; ?></td>
        <td><?php echo $user_mobile; ?></td>
        <td><a href='./index.php?delete_user=<?php echo $user_id; ?>' class='text-light'
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
        <button type="button" class="btn btn-primary"><a href="./index.php?delete_user=<?php echo $user_id; ?>"
        class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>