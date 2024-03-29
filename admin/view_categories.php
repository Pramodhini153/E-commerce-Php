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

<h3 class="text-center text-success">All Categories</h3>
<!-- products table -->
<table class="table table-bordered mt-5">
    
    
<?php
$categories_qry="SELECT * from categories";
$res_categories_qry=mysqli_query($con,$categories_qry);
$categories_count=mysqli_num_rows($res_categories_qry);
if($categories_count==0){
    echo "<h2 class='text-danger text-center mt-5'>No Categories yet</h2>";
}
else{
    echo "<thead class='bg-info'>
    <tr>
        <th>Category No</th>
        <th>Category Title</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>";
$num=1;
while($categories_data=mysqli_fetch_assoc($res_categories_qry)){
    $category_id=$categories_data['category_id'];
    $category_title=$categories_data['category_title'];
    ?>
    <tbody class='bg-secondary text-center text-light'>
        <td><?php echo $category_id; ?></td>
        <td><?php echo $category_title; ?></td>
        <td><a href='./index.php?edit_category=<?php echo $category_id; ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td><a href='./index.php?delete_category=<?php echo $category_id; ?>' class='text-light'
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
        <button type="button" class="btn btn-primary"><a href="./index.php?delete_category=<?php echo $category_id; ?>"
        class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div>  
</body>
</html>