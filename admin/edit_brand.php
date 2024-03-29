<?php
if(isset($_GET['edit_brand'])){
    $brand_id=$_GET['edit_brand'];
    $brand_title_qry="SELECT * from brands where brand_id=$brand_id";
    $res_brand_title_qry=mysqli_query($con,$brand_title_qry);
    $brand_row_data=mysqli_fetch_assoc($res_brand_title_qry);
    $brand_title=$brand_row_data['brand_title'];
}
?>
<!-- Launch demo model -->
<div class="container mt-5">
    <h1 class="text-center">Edit Brand</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-3">
            <label for="brand_title" class="form-label">Brand</label>
            <input type="text" id="brand_title" name="brand_title" class="form-control" required="required"
            value="<?php echo $brand_title; ?>">
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <input type="submit" id="brand_update" name="brand_update" class="bg-info px-3 py-2 border-0" 
            value="Update brand" required="required">
        </div>
    </form>
</div>

<?php
if(isset($_POST['brand_update'])){
    $brand_title=$_POST['brand_title'];
    $update_brand_qry="UPDATE brands set brand_title='$brand_title' where brand_id=$brand_id";
    $res_update_brand_qry=mysqli_query($con,$update_brand_qry);
    if($res_update_brand_qry){
        echo "<script>alert('Brand updated succesfully...')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}
?>
