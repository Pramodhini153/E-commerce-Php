<?php
if(isset($_GET['edit_category'])){
    $category_id=$_GET['edit_category'];
    $cat_title_qry="SELECT * from categories where category_id=$category_id";
    $res_cat_title_qry=mysqli_query($con,$cat_title_qry);
    $cat_row_data=mysqli_fetch_assoc($res_cat_title_qry);
    $category_title=$cat_row_data['category_title'];
}
?>
<div class="container mt-5">
    <h1 class="text-center">Edit Category</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-3">
            <label for="category_title" class="form-label">Category</label>
            <input type="text" id="category_title" name="category_title" class="form-control" required="required"
            value="<?php echo $category_title; ?>">
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <input type="submit" id="category_update" name="category_update" class="bg-info px-3 py-2 border-0" 
            value="Update Category" required="required">
        </div>
    </form>
</div>
<?php
if(isset($_POST['category_update'])){
    $category_title=$_POST['category_title'];
    $update_cat_qry="UPDATE categories set category_title='$category_title' where category_id=$category_id";
    $res_update_cat_qry=mysqli_query($con,$update_cat_qry);
    if($res_update_cat_qry){
        echo "<script>alert('Category updated succesfully...')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
    }
}
?>