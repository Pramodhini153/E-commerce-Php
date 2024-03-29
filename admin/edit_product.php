<?php
if(isset($_GET['edit_product'])){
    $edit_id=$_GET['edit_product'];
    $product_qry="SELECT * from products where product_id=$edit_id";
    $res_product_qry=mysqli_query($con,$product_qry);
    $product_row=mysqli_fetch_assoc($res_product_qry);
    $product_title=$product_row['product_title'];
    $product_desc=$product_row['product_desc'];
    $product_keywords=$product_row['product_keyword'];
    $product_category_id=$product_row['category_id'];
    $product_brand_id=$product_row['brand_id'];
    $product_image1=$product_row['product_image1'];
    $product_image2=$product_row['product_image2'];
    $product_image3=$product_row['product_image3'];
    $product_price=$product_row['product_price'];
}
$cat_qry="SELECT * from categories where category_id=$product_category_id";
$res_cat_qry=mysqli_query($con,$cat_qry);
$cat_row=mysqli_fetch_assoc($res_cat_qry);
$cat=$cat_row['category_title'];
$brand_qry="SELECT * from brands where brand_id=$product_brand_id";
$res_brand_qry=mysqli_query($con,$brand_qry);
$brand_row=mysqli_fetch_assoc($res_brand_qry);
$brand=$brand_row['brand_title'];
?>
<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_title" class="form-label">Product title</label>
            <input type="text" id="product_title" name="product_title" class="form-control" required="required"
            value="<?php echo $product_title; ?>">
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_desc" class="form-label">Product Description</label>
            <input type="text" id="product_desc" name="product_desc" class="form-control" required="required"
            value="<?php echo $product_desc; ?>">
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_keywords" class="form-label">Product Keywords</label>
            <input type="text" id="product_keywords" name="product_keywords" class="form-control" required="required"
            value="<?php echo $product_keywords; ?>">
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_categories" class="form-label">Product Categories</label>
            <select name="product_categories" class="form-select" id="product_categories">
            <option value="<?php echo $product_category_id; ?>"><?php echo $cat; ?></option>
                <?php
                    $cat_all_qry="SELECT * from categories";
                    $res_cat_all_qry=mysqli_query($con,$cat_all_qry);
                    while($cat_all_row=mysqli_fetch_assoc($res_cat_all_qry)){
                        $cat_title=$cat_all_row['category_title'];
                        $cat_id=$cat_all_row['category_id'];
                        echo "<option value=$cat_id>$cat_title</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_brands" class="form-label">Product Brands</label>
            <select name="product_brands" class="form-select" id="product_brands">
                <option value="<?php echo $product_brand_id; ?>"><?php echo $brand; ?></option>
                <?php
                    $brand_all_qry="SELECT * from brands";
                    $res_brand_all_qry=mysqli_query($con,$brand_all_qry);
                    while($brand_all_row=mysqli_fetch_assoc($res_brand_all_qry)){
                        $brand_title=$brand_all_row['brand_title'];
                        $brand_id=$brand_all_row['brand_id'];
                        echo "<option value=$brand_id>$brand_title</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_image1" class="form-label">Product Image1</label>
            <div class="d-flex">
            <input type="file" id="product_image1" name="product_image1" class="form-control w-90 m-auto" required="required">
            <?php echo "<img src='./product_images/$product_image1' alt='' height='100' width='100'>"; ?>
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_image2" class="form-label">Image2</label>
            <div class="d-flex">
            <input type="file" id="product_image2" name="product_image2" class="form-control w-90 m-auto" required="required">
            <?php echo "<img src='./product_images/$product_image2' alt='' height='100' width='100'>"; ?>
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_image3" class="form-label">Image3</label>
            <div class="d-flex">
            <input type="file" id="product_image3" name="product_image3" class="form-control w-90 m-auto" required="required">
            <?php echo "<img src='./product_images/$product_image3' alt='' height='100' width='100'>"; ?>
            </div>
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <label for="product_price" class="form-label">Price</label>
            <input type="text" id="product_price" name="product_price" class="form-control" required="required"
            value="<?php echo $product_price; ?>">
        </div>
        <div class="form-outline w-50 m-auto mb-3">
            <input type="submit" id="product_update" name="product_update" class="bg-info px-3 py-2 border-0" 
            value="Update Product" required="required">
        </div>
    </form>
</div>
<!-- Update product-->
<?php
if(isset($_POST['product_update'])){
    $product_title=$_POST['product_title'];
    $product_desc=$_POST['product_desc'];
    $product_keywords=$_POST['product_keywords'];
    $product_category=$_POST['product_categories'];
    $product_brand=$_POST['product_brands'];
    $product_price=$_POST['product_price'];
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];
    $temp_product_image1=$_FILES['product_image1']['tmp_name'];
    $temp_product_image2=$_FILES['product_image2']['tmp_name'];
    $temp_product_image3=$_FILES['product_image3']['tmp_name'];
    if($product_title=="" or $product_desc=="" or $product_keywords=="" or $product_category=="" or $product_brand=="" or 
    $product_price=="" or $product_image1=="" or $product_image2=="" or $product_image3==""){
        echo "<script>alert('Please fill all the fields and continue the process...')</script>";
    }
    else{
        move_uploaded_file($temp_product_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_product_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_product_image3,"./product_images/$product_image3");
        // update query
        $update_qry="UPDATE products set product_title='$product_title',product_desc='$product_desc',
        product_keyword='$product_keywords',category_id=$product_category,brand_id=$product_brand,
        product_image1='$product_image1',product_image2='$product_image2',product_image3='$product_image3',
        product_price='$product_price',dates=NOW() where product_id=$edit_id";
        $res_update_qry=mysqli_query($con,$update_qry);
        if($res_update_qry){
        echo "<script>alert('Product updated succesfully...')</script>";
        echo "<script>window.open('./index.php','_self')</script>";
        }
        
    }
}
?>