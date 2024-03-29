<?php
include('../includes/db.php');
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
  <img src="../images/cart_image.png" alt="" class="logo">
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
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="user_register.php">Register</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Contact</a>
        </li>
       
        
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
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <?php
                            if(isset($_SESSION['user_username'])){
                                include('./payment.php');
                                // header("location:payment.php");
                            }
                            else{
                                include('user_login.php');
                                // header("location:user_area/user_login.php");
                            }
                            
                        ?>
                    </div>
                </div>
            </div>
    </div>
        
    <?php
      include('../includes/footer.php');
    ?>
    </div>
    <?php
    //   echo $remove=remove_cart_items();
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
</html>