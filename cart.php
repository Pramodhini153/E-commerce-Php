<?php
include('./includes/db.php');
include('./functions/com_fn.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" 
    integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .logo{
            height:50px;
            width:50px;
        }
        .card-img-top{
            height:200px;
            width:100%;
            object-fit:contain;
            padding-top:10px;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0 ">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
  <img src="./images/cart_image.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="display_all.php">Products</a>
        </li>
        <?php
        if(isset($_SESSION['user_username'])){
          echo "<li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='user_area/profile.php'>My Account</a>
          </li>";
        }
        else{
          echo "<li class='nav-item'>
            <a class='nav-link active' aria-current='page' href='../user_area/user_register.php'>Register</a>
          </li>";
        }
        ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Contact</a>
        </li>
        <!-- <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="cart.php">
          <i class='fa-solid fa-cart-shopping'></i>
            <sup>
           
            </sup> -->
      <!-- </a>
        </li> -->
        
      </ul>
    </div>
  </div>
</nav>
      
        <div class="navbar navbar-expand-lg navbar-dark bg-secondary">
            <ul class="navbar-nav me-auto">
            <?php
        if(isset($_SESSION['user_username'])){
          echo "<li class='nav-item'>
          <a class='nav-link active' aria-current='page' href='#'>Welcome ".$_SESSION['user_username']."</a>
        </li>";
        }
        else{
          echo "<li class='nav-item'>
                  <a class='nav-link active' aria-current='page' href='#'>Welcome Guest</a>
              </li>";
        }
        if(!isset($_SESSION['user_username'])){
          
          echo "<li class='nav-item'>
                  <a class='nav-link active' aria-current='page' href='user_area/user_login.php'>Login</a>
              </li>";
        }
        else{
          echo "<li class='nav-item'>
                  <a class='nav-link active' aria-current='page' href='user_area/user_logout.php'>Logout</a>
              </li>";
        }
        ?>
            </ul>
        </div>
        <div class="bg-light">
        <h3 class="text-center">Hidden Store</h3>
        <p class="text-center">Communications is at the heart of E-commerce and community</p>
        </div>
        <div class="container">
            <div class="row">
              <form action="" method="post">
        <table class="table table-bordered text-center">
           
                <?php

    $get_ip_address = getIPAddress();
    $total_price=0;
    $select_query="SELECT * from cart_details where ip_address='$get_ip_address '";
    $res_query=mysqli_query($con,$select_query);
    $num_rows=mysqli_num_rows($res_query);
    if($num_rows>0){
    echo " <thead>
    <tr>
        <th>Product Title</th>
        <th>Product Image</th>
        <th>Quantity</th>
        <th>Total Price</th>
        <th>Remove</th>
        <th colspan='2'>Operations</th>
    </tr>
</thead>
<tbody>";
    while($row_data=mysqli_fetch_array($res_query)){
      $product_id=$row_data['product_id'];
      $select_price_query="SELECT * from products where product_id=$product_id";
      $res_price_query=mysqli_query($con,$select_price_query);
      while($row_data=mysqli_fetch_array($res_price_query)){
        $product_price=array($row_data['product_price']);
        $table_price=$row_data['product_price'];
        $table_title=$row_data['product_title'];
        $table_image=$row_data['product_image1'];
        $product_price_sum=array_sum($product_price);
        $total_price+=$product_price_sum;
     
    ?>
            <tr>
                    <th><?php echo"$table_title"; ?></th>
                    <th><img src="./admin/product_images/<?php echo"$table_image";?>" style="object-fit:contain;" height="80" width="80" alt=""></th>
                    <?php
                        $get_ip_address = getIPAddress();
                        if(isset($_POST['update_cart'])){
                          $product_id=$_GET['product_id'];
                          $quantity=$_POST['qty'];
                          $update_cart_query="UPDATE cart_details set quantity=$quantity where ip_address='$get_ip_address' and product_id=$product_id";
                          // $price=$table_price*
                          $update_cart_result_query=mysqli_query($con,$update_cart_query);
                          $total_price=$total_price*intval($quantity);
                        }
                    ?>
                    <th><input class="form-input w-50" type="text"  name="qty<?php echo $product_id;?>"></th>
                    
                    <th ><?php echo"$table_price"; ?></th>
                    <th><input type="checkbox" name="remove_cart[]" value="<?php echo  $product_id; ?>"></th>
                    <th>
            
                    <!-- <button class="bg-info border-0  px-3 py-1">Remove</button> -->
                    <!-- <input type="submit" class="bg-info border-0  px-3 py-1" href="cart.php?update_item=<?php echo $product_id;?>" >update cart</input> -->
                    <!-- <button class="bg-info border-0  px-3 py-1">Remove</button> -->
                    <input type="submit" class="bg-info border-0  px-3 py-1" name="update_item" value="Update Cart">
                    <input type="submit" class="bg-info border-0  px-3 py-1" name="remove_item" value="Remove Item">
                    </th>
                </tr>
                <?php
                 }
                }
              }
                ?>
            </tbody>
        </table>
        
        <?php

$get_ip_address = getIPAddress();
$select_query="SELECT * from cart_details where ip_address='$get_ip_address '";
$res_query=mysqli_query($con,$select_query);
$num_rows=mysqli_num_rows($res_query);
if($num_rows>0){
  echo"
  <div class='d-flex gap-5 mb-5'>
            <h4> Subtotal:<strong class='text-info'>$total_price</strong>/-</h4>
            <a href='index.php'>
                <input class='bg-info border-0  px-3 py-2' type='submit' value='Continue Shopping' name='continue'>
            </a>
           
            
                <button class='bg-secondary  border-0 text-light px-3 py-2'  name='checkout'>
                <a href='user_area/checkout.php' class='text-light text-decoration-none'>Checkout</a>
                </button>
            
    </div> ";
}
else{
  echo"
  <div>
  <h1 class='text-danger text-center'>Cart is Empty...</h1>
  <a href='index.php'>
                <input class='bg-info border-0 mb-4 px-3 py-2'  type='submit' value='Continue Shopping' name='continue'>
            </a>
  </div>
  ";
}
?>
       
        </form>
        </div>
        </div>
        
    <?php
      include('./includes/footer.php');
    ?>
    </div>
    <?php
      echo $remove=remove_cart_items();
    if(isset($_POST['continue'])){
      echo "<script>window.open('index.php','_self')</script>";
    }
    ?>
    


 <!-- <?php  

// if(isset($_GET['update_item']))
// {
  // $update_item_id = $_GET['update_item'];
  
  // $update_item = 'qty'.$update_item_id;


  
  
// }

?> -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
     crossorigin="anonymous"></script>
</body>
</html