<?php
// include('./includes/db.php');
function get_products(){
    global $con;
    if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
    $select_query="SELECT * from products order by rand() limit 0,9";
          $res_query=mysqli_query($con,$select_query);
          while($row_data=mysqli_fetch_assoc($res_query)){
            $product_id=$row_data['product_id'];
            $product_title=$row_data['product_title'];
            $product_desc=$row_data['product_desc'];
            $product_image1=$row_data['product_image1'];
            $brand_id=$row_data['brand_id'];
            $category_id=$row_data['category_id'];
            $product_price=$row_data['product_price'];
            echo "  
            
                <div class='col-md-4 mb-4'>
                <div class='card' >
  <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
  <div class='card-body'>
    <h5 class='card-title'>$product_title</h5>
    <p class='card-text'>$product_desc.</p>
    <p class='card-text'>Price: $product_price/-</p>
    <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
    <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
  </div>
</div>
                   
   
    </div>";
          }
       
}
}
}
//getting all products
function get_all_products(){
  global $con;
  if(!isset($_GET['category'])){
    if(!isset($_GET['brand'])){
  $select_query="SELECT * from products order by rand()";
        $res_query=mysqli_query($con,$select_query);
        while($row_data=mysqli_fetch_assoc($res_query)){
          $product_id=$row_data['product_id'];
          $product_title=$row_data['product_title'];
          $product_desc=$row_data['product_desc'];
          $product_image1=$row_data['product_image1'];
          $brand_id=$row_data['brand_id'];
          $category_id=$row_data['category_id'];
          $product_price=$row_data['product_price'];
          echo "  
          
              <div class='col-md-4 mb-4'>
              <div class='card' >
<img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
<div class='card-body'>
  <h5 class='card-title'>$product_title</h5>
  <p class='card-text'>$product_desc.</p>
  <p class='card-text'>Price: $product_price/-</p>
  <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
</div>
</div>
                 
 
  </div>";
        } 
}
}
}
//getting unique categories
function get_unique_categories(){
  global $con;
  if(isset($_GET['category'])){
   $category_id=$_GET['category'];
  $select_query="SELECT * from products where category_id=$category_id";
        $res_query=mysqli_query($con,$select_query);
        $num_row=mysqli_num_rows($res_query);
        if($num_row==0){
          echo "<h2 class='text-center text-danger'>No Stock for this Category</h2>";
        }
        while($row_data=mysqli_fetch_assoc($res_query)){
          $product_id=$row_data['product_id'];
          $product_title=$row_data['product_title'];
          $product_desc=$row_data['product_desc'];
          $product_image1=$row_data['product_image1'];
          $brand_id=$row_data['brand_id'];
          $category_id=$row_data['category_id'];
          $product_price=$row_data['product_price'];
          echo "  
        
              <div class='col-md-4 mb-4'>
              <div class='card' >
<img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
<div class='card-body'>
  <h5 class='card-title'>$product_title</h5>
  <p class='card-text'>$product_desc.</p>
  <p class='card-text'>Price: $product_price/-</p>
  <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
</div>
</div>
  </div>";
        }    
}
}
//getting unique brands
function get_unique_brands(){
  global $con;
  if(isset($_GET['brand'])){
   $brand_id=$_GET['brand'];
  $select_query="SELECT * from products where brand_id=$brand_id";
        $res_query=mysqli_query($con,$select_query);
        $num_rows=mysqli_num_rows($res_query);
        if($num_rows==0){
          echo "<h2 class='text-center text-danger'>This Brand is not available for service</h2>";
        }
        while($row_data=mysqli_fetch_assoc($res_query)){
          $product_id=$row_data['product_id'];
          $product_title=$row_data['product_title'];
          $product_desc=$row_data['product_desc'];
          $product_image1=$row_data['product_image1'];
          $brand_id=$row_data['brand_id'];
          $category_id=$row_data['category_id'];
          $product_price=$row_data['product_price'];
          echo "  
          
              <div class='col-md-4 mb-4'>
              <div class='card' >
<img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
<div class='card-body'>
  <h5 class='card-title'>$product_title</h5>
  <p class='card-text'>$product_desc.</p>
  <p class='card-text'>Price: $product_price/-</p>
  <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
</div>
</div>
  </div>";
        }    
}
}
function get_brands(){
    global $con;
    $select_brands="SELECT * from brands";
            $result_brands=mysqli_query($con,$select_brands);
            
            while($row_data=mysqli_fetch_assoc($result_brands)){
              $brand_title=$row_data['brand_title'];
              $brand_id=$row_data['brand_id'];
               echo "<li class='nav-item'>
                <a href='index.php?brand=$brand_id' class='nav-link text-white'>$brand_title</a>
                </li>";
            }
}
function get_categories(){
    global $con;
    $select_cat="SELECT * from categories";
            $result_cat=mysqli_query($con,$select_cat);
            
            while($row_data=mysqli_fetch_assoc($result_cat)){
              $category_title=$row_data['category_title'];
              $category_id=$row_data['category_id'];
               echo "<li class='nav-item'>
                <a href='index.php?category=$category_id' class='nav-link text-white'>$category_title</a>
                </li>";
            }
}
//searching products
function search_products(){
  global $con;
  if(isset($_GET['search_data_product'])){
    $search_product=$_GET['search_data'];
  $search_query="SELECT * from products where product_keyword like '%$search_product%'";
        $res_query=mysqli_query($con,$search_query);
        $num_row=mysqli_num_rows($res_query);
        if($num_row==0){
          echo "<h2 class='text-center text-danger'>No Results match.No Products found on this category! </h2>";
        }
        while($row_data=mysqli_fetch_assoc($res_query)){
          $product_id=$row_data['product_id'];
          $product_title=$row_data['product_title'];
          $product_desc=$row_data['product_desc'];
          $product_image1=$row_data['product_image1'];
          $brand_id=$row_data['brand_id'];
          $category_id=$row_data['category_id'];
          $product_price=$row_data['product_price'];
          echo "  
          
              <div class='col-md-4 mb-4'>
              <div class='card' >
<img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
<div class='card-body'>
  <h5 class='card-title'>$product_title</h5>
  <p class='card-text'>$product_desc.</p>
  <p class='card-text'>Price: $product_price/-</p>
  <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
  <a href='product_details.php?product_id=$product_id' class='btn btn-secondary'>view more</a>
</div>
</div>
                 
 
  </div>";
        }    
}
}
//viewing details
function get_product_details(){
  global $con;
  if(isset($_GET['product_id'])){
    if(!isset($_GET['category'])){
      if(!isset($_GET['brand'])){
        $product_id=$_GET['product_id'];
    $select_query="SELECT * from products where product_id='$product_id'";
          $res_query=mysqli_query($con,$select_query);
          while($row_data=mysqli_fetch_assoc($res_query)){
            $product_id=$row_data['product_id'];
            $product_title=$row_data['product_title'];
            $product_desc=$row_data['product_desc'];
            $product_image1=$row_data['product_image1'];
            $product_image2=$row_data['product_image2'];
            $product_image3=$row_data['product_image3'];
            $brand_id=$row_data['brand_id'];
            $category_id=$row_data['category_id'];
            $product_price=$row_data['product_price'];
            echo "  
            
            <div class='col-md-4'>
                    <div class='card'>
                        <img src='./admin/product_images/$product_image1' class='card-img-top' alt='...'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text'>$product_desc.</p>
                            <p class='card-text'>Price: $product_price/-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to cart</a>
                            <a href='index.php' class='btn btn-secondary'>Go home</a>
                        </div>
                        </div>
                    </div>
                    <div class='col-md-8'>
                        <div>
                            <h2 class='text-center text-info'>Related Products</h2>
                        </div>
                        <div class='row'>
                        <div class='col-md-6'>
                        <img src='./admin/product_images/$product_image2' class='card-img-top' alt='...'>
                        </div>
                        <div class='col-md-6'>
                        <img src='./admin/product_images/$product_image3' class='card-img-top' alt='...'>
                        </div>
                    </div>
                   
              ";
          }
        }
}
}
}
//get ip address
function getIPAddress() {  
  //whether ip is from the share internet  
   if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
              $ip = $_SERVER['HTTP_CLIENT_IP'];  
      }  
  //whether ip is from the proxy  
  elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
              $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
   }  
//whether ip is from the remote address  
  else{  
           $ip = $_SERVER['REMOTE_ADDR'];  
   }  
   return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;
function cart(){
  global $con;
  if(isset($_GET['add_to_cart'])){
    $get_ip_address = getIPAddress();
    $get_product_id=$_GET['add_to_cart'];
    
    $select_query="SELECT * from cart_details where ip_address='$get_ip_address' and product_id=$get_product_id";
    $res_query=mysqli_query($con,$select_query);
    $num_rows=mysqli_num_rows($res_query);
    if($num_rows>0){
      echo "<script>alert('This item is already present inside the cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
    else{
      $insert_query="INSERT into cart_details(product_id,ip_address,quantity) values($get_product_id,'$get_ip_address',0)";
      $res_query=mysqli_query($con,$insert_query);
      echo "<script>alert('Item is added to Cart')</script>";
      echo "<script>window.open('index.php','_self')</script>";
    }
  }
 
}
function cart_items_num(){
    global $con;
    $get_ip_address = getIPAddress();
    $select_query="SELECT * from cart_details where ip_address='$get_ip_address'";
    $res_query=mysqli_query($con,$select_query);
    $num_rows=mysqli_num_rows($res_query);
    echo "$num_rows";
}
function total_price(){
    global $con;
    $get_ip_address = getIPAddress();
    $total_price=0;
    $select_query="SELECT * from cart_details where ip_address='$get_ip_address '";
    $res_query=mysqli_query($con,$select_query);
    while($row_data=mysqli_fetch_array($res_query)){
      $product_id=$row_data['product_id'];
      $select_price_query="SELECT * from products where product_id=$product_id";
      $res_price_query=mysqli_query($con,$select_price_query);
      while($row_data=mysqli_fetch_array($res_price_query)){
        $product_price=array($row_data['product_price']);
        $product_price_sum=array_sum($product_price);
        $total_price+=$product_price_sum;
      }
    }
    echo "$total_price";
}
function remove_cart_items(){
  global $con;
    $get_ip_address = getIPAddress();
  if(isset($_POST['remove_item'])){
    foreach($_POST['remove_cart'] as $remove_id){
      echo $remove_id;
      $delete_query="DELETE from cart_details where ip_address='$get_ip_address ' and product_id=$remove_id ";
      $res_delete_query=mysqli_query($con,$delete_query);
      if($res_delete_query){
        echo "<script>window.open('cart.php','_self')</script>";
      }
    }
    

  }
}

//getting user pending orders
function get_user_pending_orders(){
  global $con;
  $username=$_SESSION['user_username'];
  $get_user_details="SELECT * from user_table where user_name='$username'";
  $get_user_details_res=mysqli_query($con,$get_user_details);
  while($row_user_details=mysqli_fetch_array($get_user_details_res)){
    $user_id=$row_user_details['user_id'];
    if(!isset($_GET['edit_account'])){
      if(!isset($_GET['my_orders'])){
        if(!isset($_GET['delete_account'])){
            $get_orders_qry="SELECT * from user_orders where user_id=$user_id and order_status='pending'";
            $res_get_orders_qry=mysqli_query($con,$get_orders_qry);
            $row_get_orders_data=mysqli_num_rows($res_get_orders_qry);
            if($row_get_orders_data>0){
              echo "<h2 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>$row_get_orders_data</span> orders pending</h2>";
              echo "<p class='text-center '><a href='profile.php?my_orders' class='text-dark'>Order Details</a></p>";
            }
            else{
              echo "<h2 class='text-center text-success mt-5 mb-2'>You have <span class='text-danger'>0</span> orders pending</h2>";
              echo "<p class='text-center '><a href='../index.php' class='text-dark'>Explore Products</a></p>";
            }
        }
      }
    }
  }
}
?>