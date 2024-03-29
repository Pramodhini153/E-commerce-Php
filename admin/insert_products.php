<?php
include('../includes/db.php');
if(isset($_POST['insert_Product'])){
    $product_title=$_POST['product_title'];
    $product_description=$_POST['product_description'];
    $product_keyword=$_POST['product_keyword'];
    $product_category=$_POST['product_category'];
    $product_brand=$_POST['product_brand'];
    $product_price=$_POST['product_price'];
    $product_status=true;
    //image accessing
    $product_image1=$_FILES['product_image1']['name'];
    $product_image2=$_FILES['product_image2']['name'];
    $product_image3=$_FILES['product_image3']['name'];
     //accessing temporary name image 
     $temp_image1=$_FILES['product_image1']['tmp_name']; 
     $temp_image2=$_FILES['product_image2']['tmp_name'];
     $temp_image3=$_FILES['product_image3']['tmp_name'];
     //checking empty condition
     if($product_title=="" or $product_description=="" or $product_keyword=="" or
     $product_price=="" or $product_image1=="" or $product_image2=="" or $product_image3=="" ){
        echo "<script>alert('Please fill the available fields')</script>";
        exit();
     }
     else{
        //moving images
        move_uploaded_file($temp_image1,"./product_images/$product_image1");
        move_uploaded_file($temp_image2,"./product_images/$product_image2");
        move_uploaded_file($temp_image3,"./product_images/$product_image3");
        // insert query
        $insert_products_qry="INSERT into products(product_title,product_desc,product_keyword,category_id,brand_id
        ,product_image1,product_image2,product_image3,product_price,dates,status) values('$product_title',
        '$product_description','$product_keyword','$product_category','$product_brand','$product_image1','$product_image2',
        '$product_image3','$product_price',NOW(),'$product_status')";
        $res_insert_products=mysqli_query($con,$insert_products_qry);
        if($res_insert_products){
            echo "<script>alert('Successfully inserted the products')</script>";
        }
     }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=\, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../style.css">
</head>
<body class="bg-light">
    <h1 class="text-center mt-4">Insert Products</h1>
    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="form-outline mb-4 m-auto w-50">
            <label for="product_title" class="form-label">Product Title</label>
            <input type="text" name="product_title" id="product_title" placeholder="Enter Product title" class="form-control"
            required="required">
        </div>
        <div class="form-outline mb-4 m-auto w-50">
            <label for="product_description" class="form-label">Product Description</label>
            <input type="text" name="product_description" id="product_description" placeholder="Enter Product Description" class="form-control"
            required="required">
        </div>
        <div class="form-outline mb-4 m-auto w-50">
            <label for="product_keyword" class="form-label">Product Keyword</label>
            <input type="text" name="product_keyword" id="product_keyword" placeholder="Enter Product keywords" class="form-control"
            required="required">
        </div>
        <div class="form-outline mb-4 m-auto w-50">
            <select name="product_category" id="product_category" class="form-select">
                <option value="">Select a Category</option>
                <?php
                    $select_query="SELECT * from categories";
                    $res_query=mysqli_query($con,$select_query);
                    while($row_data=mysqli_fetch_assoc($res_query)){
                        $category_id=$row_data['category_id'];
                        $category_title=$row_data['category_title'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-outline mb-4 m-auto w-50">
            <select name="product_brand" id="product_brand" class="form-select">
                <option value="">Select a Brand</option>
                <?php
                    $select_query="SELECT * from brands";
                    $res_query=mysqli_query($con,$select_query);
                    while($row_data=mysqli_fetch_assoc($res_query)){
                        $brand_id=$row_data['brand_id'];
                        $brand_title=$row_data['brand_title'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                ?>
            </select>
        </div>
        <div class="form-outline mb-4 m-auto w-50">
            <label for="product_image1" class="form-label">Product image1</label>
            <input type="file" name="product_image1" id="product_image1" class="form-control"
            required="required">
        </div>
        <div class="form-outline mb-4 m-auto w-50">
            <label for="product_image2" class="form-label">Product image2</label>
            <input type="file" name="product_image2" id="product_image2" class="form-control"
            required="required">
        </div>
        <div class="form-outline mb-4 m-auto w-50">
            <label for="product_image3" class="form-label">Product image3</label>
            <input type="file" name="product_image3" id="product_image3" class="form-control"
            required="required">
        </div>
        <div class="form-outline mb-4 m-auto w-50">
            <label for="product_price" class="form-label">Product Price</label>
            <input type="text" name="product_price" id="product_price" placeholder="Enter Product title" class="form-control"
            required="required">
        </div>
        <div class="form-outline mb-4 m-auto w-50">
            <input type="submit" name="insert_Product" value="Insert Product" class="btn btn-info mb-3 px-3"
            required="required">
        </div>
    </form>
</body>
</html>