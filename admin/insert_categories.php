<?php
include('../includes/db.php');
if(isset($_POST['insert_cat']))
{
    $cat_title=$_POST['cat_title'];
    $select_qry="SELECT * from categories where category_title='$cat_title'";
    $res_select=mysqli_query($con,$select_qry);
    $num_rows=mysqli_num_rows($res_select);
    if($num_rows>0){
      echo "<script>alert('Category has been already inserted')</script>";
    }
    else{
    $insert_qry="INSERT into categories(category_title) values('$cat_title')";
    $res=mysqli_query($con,$insert_qry);
    if($res){
      echo "<script>alert('Category has been inserted successfully')</script>";
    }
  }
}
?>
<h1 class="text-center my-4">Insert Categories</h1>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-3">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt"></i></span>
        <input type="text" class="form-control" placeholder="Insert Categories" name="cat_title"
         aria-label="categories" aria-describedby="basic-addon1">
      </div>
      <div class="input-group w-10 mb-3">
        <input type="submit" class="bg-info p-2 my-3 border-0" value="Insert Categories" name="insert_cat">
        <!-- <button class="bg-info p-2 my-3 border-0" name="submit">Insert Categories</button> -->
      </div>
</form>