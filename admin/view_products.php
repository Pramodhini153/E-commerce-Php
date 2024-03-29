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

<h3 class="text-center text-success">All Products</h3>
<!-- products table -->
<table class="table table-bordered mt-5">
    
<?php
$products_qry="SELECT * from products";
$res_products_qry=mysqli_query($con,$products_qry);
$products_count=mysqli_num_rows($res_products_qry);
if($products_count==0){
    echo "<h2 class='text-danger text-center mt-5'>No Products yet</h2>";
}
else{
    echo "<thead class='bg-info'>
    <tr>
        <th>Product No</th>
        <th>Product Title</th>
        <th>Product Image</th>
        <th>Product Price</th>
        <th>Total Sold</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
</thead>
";
$num=1;
while($products_data=mysqli_fetch_assoc($res_products_qry)){
    $product_id=$products_data['product_id'];
    $product_title=$products_data['product_title'];
    $product_price=$products_data['product_price'];
    $product_image1=$products_data['product_image1'];
    $product_status=$products_data['status'];
    ?>
    <tbody class='bg-secondary text-center text-light'>
        <td><?php echo $num; ?></td>
        <td><?php echo $product_title; ?></td>
        <td><?php echo "<img src='./product_images/$product_image1' height='100' width='100'/>"; ?></td>
        <td><?php echo $product_price;; ?></td>
        <?php
            $product_count_qry="SELECT * from orders_pending where product_id=$product_id";
            $res_product_count_qry=mysqli_query($con,$product_count_qry);
            $product_count=mysqli_num_rows($res_product_count_qry);
            echo "<td>$product_count</td>";
        ?>
        <td><?php echo $product_status; ?></td>
        <td><a href='./index.php?edit_product=<?php echo $product_id; ?>' class='text-light'><i class='fa-solid fa-pen-to-square'></i></a></td>
        <td><a href='./index.php?delete_product=<?php echo $product_id; ?>' class='text-light'
        type="button"  data-toggle="modal" data-target="#exampleModal">
        <i class='fa-solid fa-trash'></i></a></td>
        </tbody>
        <?php 
        $num=$num+1; 
        ?>
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
        <button type="button" class="btn btn-primary"><a href="./index.php?delete_product=<?php echo $product_id; ?>"
        class="text-light text-decoration-none">Yes</a></button>
      </div>
    </div>
  </div>
</div> 
</body>
</html>