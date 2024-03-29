<?php
include('../includes/db.php');
include('../functions/com_fn.php');
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
        .profile_img{
            height:90%;
            width:90%;
            display:block;
            margin:auto;
            object-fit:contain;
        }
        .edit_img{
            height:10%;
            width:20%;
            object-fit:contain;
        }
    </style>
</head>
<body>
    <div class="container-fluid p-0 ">
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
  <div class="container-fluid">
    <img src="../images/cart_image.png" alt="" class="logo">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../display_all.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="profile.php">My Account</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../cart.php">
          <i class='fa-solid fa-cart-shopping'></i>
            <sup>
            <?php
            cart_items_num();
            ?>
            </sup>
      </a>
        </li>
        <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="#">Total Price: <?php  total_price();?>/-</a>
        </li>
      </ul>
      <form class="d-flex" action="search_products.php" method="get">
        <input class="form-control me-2" type="search" placeholder="Search" name="search_data" aria-label="Search">
        <!-- <button class="btn btn-outline-light" type="submit">Search</button> -->
        <input type="submit" class="btn btn-outline-light" name="search_data_product"  value="Search">
      </form>
    </div>
  </div>
</nav>
      <?php
      cart();
      ?>
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
                  <a class='nav-link active' aria-current='page' href='user_login.php'>Login</a>
              </li>";
        }
        else{
          echo "<li class='nav-item'>
                  <a class='nav-link active' aria-current='page' href='user_logout.php'>Logout</a>
              </li>";
        }
        ?>
            </ul>
        </div>
        <div class="bg-light">
        <h3 class="text-center">Hidden Store</h3>
        <p class="text-center">Communications is at the heart of E-commerce and community</p>
        </div>
        <div class="row">
            <div class="col-md-2">
                <ul class="navbar-nav bg-secondary text-center" style="height:100vh">
                <li class="nav-item">
                    <a class="nav-link bg-info text-light" href="profile.php"><h4>Your Profile</h4></a>
                </li>
                <?php
                    $username=$_SESSION['user_username'];
                    $user_img_qry="SELECT * from user_table where user_name='$username'";
                    $res_user_img_qry=mysqli_query($con,$user_img_qry);
                    $row_user_img_data=mysqli_fetch_array($res_user_img_qry);
                    $user_img=$row_user_img_data['user_image'];
                    echo "<li class='nav-item my-1'>
                    <img src='./user_images/$user_img' alt='profile' class='profile_img'>
                </li>";
                ?>
                
                <li class="nav-item">
                    <a class="nav-link text-light " href="profile.php">Pending Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light " href="profile.php?edit_account">Edit Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light " href="profile.php?my_orders">My Orders</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light " href="profile.php?delete_account">Delete Account</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light " href="user_logout.php">Logout</a>
                </li>
                </ul>
            </div>
            <div class="col-md-10 text-center">
                <?php
                    get_user_pending_orders();
                    if(isset($_GET['edit_account'])){
                      include('./edit_account.php');
                    }
                    if(isset($_GET['my_orders'])){
                      include('./my_orders.php');
                    }
                    if(isset($_GET['delete_account'])){
                      include('./delete_account.php');
                    }
                ?>
            </div>
        </div>
    <?php
      include('../includes/footer.php');
    ?>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
     crossorigin="anonymous"></script>
</body>
</html>