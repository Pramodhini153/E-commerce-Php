<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            overflow-x:hidden;
        }
    </style>
</head>
<body>

<h3 class="text-center text-success">All Brands</h3>
<!-- products table -->
<table class="table table-bordered mt-5">
    
    
<?php
$brands_qry="SELECT * from brands";
$res_brands_qry=mysqli_query($con,$brands_qry);
$brands_count=mysqli_num_rows($res_brands_qry);
if($brands_count==0){
    echo "<h2 class='text-danger text-center mt-5'>No Brands yet</h2>";
}
else{
echo "<thead class='bg-info'>
<tr>
    <th>Brand No.</th>
    <th>Brand Title</th>
    <th>Edit</th>
    <th>Delete</th>
</tr>
</thead>";
$num=1;
while($brands_data=mysqli_fetch_assoc($res_brands_qry)){
    $brand_id=$brands_data['brand_id'];
    $brand_title=$brands_data['brand_title'];
    ?>
    <tbody class='bg-secondary text-center text-light'>
        <td><?php echo $brand_id; ?></td>
        <td><?php echo $brand_title; ?></td>
        <td><a href='./index.php?edit_brand=<?php echo $brand_id; ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td><a href='./index.php?delete_brand=<?php echo $brand_id; ?>' class='text-light'
        type="button"  data-toggle="modal" data-target="#exampleModal">
        <i class='fa-solid fa-trash'></i></a></td>
        </tbody>
        <?php $num=$num+1; ?>
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
        <button type="button" class="btn btn-secondary" data-dismiss="modal"><a href="./index.php?view_brands?"
        class="text-light text-decoration-none">NO</a></button>
        <button type="button" class="btn btn-primary"><a href="./index.php?delete_brand=<?php echo $brand_id; ?>"
        class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>  
</body>
</html>