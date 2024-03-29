<?php
include('../includes/db.php');
if(isset($_POST['insert_brand'])){
  $brand_title=$_POST['brand_title'];
  $select_qry="SELECT * from brands where brand_title='$brand_title' ";
  $select_res=mysqli_query($con,$select_qry);
  $num_rows=mysqli_num_rows($select_res);
  if($num_rows>0){
    echo "<script>alert('Brand has already been inserted')</script>";
  }
  else{
  $insert_qry="INSERT into brands(brand_title) values('$brand_title')";
  $res=mysqli_query($con,$insert_qry);
  if($res){
    echo "<script>alert('Brand has been inserted successfully')</script>";
  } 
 }
}
?>
<h1 class="text-center my-4">Insert Brands</h1>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-3">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" placeholder="Insert Brands" name="brand_title"
         aria-label="brands" aria-describedby="basic-addon1">
      </div>
      <div class="input-group w-10 mb-3">
      <input type="submit" class="bg-info p-2 my-3 border-0" value="Insert Brands" name="insert_brand">
        <!-- <button class="bg-info p-2 my-3 border-0">Insert Brands</button> -->
      </div>
</form>