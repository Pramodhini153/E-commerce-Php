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
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        .logo{
            height:50px;
            width:50px;
        }
        .admin{
            height:100px;
            width:100px;
            object-fit: contain;
        }
    </style>
</head>
<body>
<div class="container-fluid p-0">
    <nav class=" navbar navbar-expand-lg navbar-light bg-info">
        <div class="container-fluid">
        <img src="../cartimage.png" alt="" class="logo">
            <nav class=" navbar navbar-expand-lg navbar-light bg-info">
                <ul class="navbar-nav">
                    <li class="nav-item"> 
                    <?php
                if(isset($_SESSION['admin_name'])){
                    $admin_name=$_SESSION['admin_name'];
                    echo "<a href='#' class='nav-link'>Welcome $admin_name</a>";
                }
                else{
                    echo "<a href='#' class='nav-link'>Welcome Guest</a>";
                }
            ?>
                        
                    </li>
                </ul>
            </nav>
        </div>
    </nav>
    <div class="bg-light">
        <h2 class="text-center p-2">Manage Details</h2>
    </div>
    <div class="row bg-secondary p-3 ">
        <div class="col-md-12 d-flex align-items-center px-3 ">
            <div>
                <img src="../boat earphones.jpg" class="admin" alt="">
                <?php
                if(isset($_SESSION['admin_name'])){
                    $admin_name=$_SESSION['admin_name'];
                    echo "<p class='text-center text-light'>$admin_name</p>";
                }
                else{
                    echo "<p class='text-center text-light'>Admin Name</p>";
                }
            ?>
            </div>
        <div class="button text-center">
            <button class="my-2 px-1"><a href="./insert_products.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
            <button class=" px-1"><a href="./index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
            <button class=" px-1"><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
            <button class=" px-1"><a href="./index.php?view_categories" class="nav-link text-light bg-info my-1">View Categories</a></button>
            <button class=" px-1"><a href="./index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
            <button class=" px-1"><a href="./index.php?view_brands" class="nav-link text-light bg-info my-1">View Brands</a></button>
            <button class=" px-1"><a href="./index.php?all_orders" class="nav-link text-light bg-info my-1">All Orders</a></button>
            <button class=" px-1"><a href="./index.php?all_payments" class="nav-link text-light bg-info my-1">All Payments</a></button>
            <button class=" px-1"><a href="./index.php?list_users" class="nav-link text-light bg-info my-1">List Users</a></button>
            <button class=" px-1"><a href="./admin_logout.php" class="nav-link text-light bg-info my-1">Logout</a></button>
        </div>
    </div>
    </div>
    <div class="container my-3">
    
    <?php
        if(isset($_GET['insert_category'])){
            include ('insert_categories.php');
        }
        if(isset($_GET['insert_brand'])){
            include ('insert_brands.php');
        }
        if(isset($_GET['view_products'])){
            include ('view_products.php');
        }
        if(isset($_GET['edit_product'])){
            include ('edit_product.php');
        }
        if(isset($_GET['delete_product'])){
            include ('delete_product.php');
        }
        if(isset($_GET['view_categories'])){
            include ('view_categories.php');
        }
        if(isset($_GET['view_brands'])){
            include ('view_brands.php');
        }
        if(isset($_GET['edit_category'])){
            include ('edit_category.php');
        }
        if(isset($_GET['edit_brand'])){
            include ('edit_brand.php');
        }
        if(isset($_GET['delete_brand'])){
            include ('delete_brand.php');
        }
        if(isset($_GET['delete_category'])){
            include ('delete_category.php');
        }
        if(isset($_GET['all_orders'])){
            include ('all_orders.php');
        }
        if(isset($_GET['delete_order'])){
            include ('delete_order.php');
        }
        if(isset($_GET['all_payments'])){
            include ('all_payments.php');
        }
        if(isset($_GET['delete_payment'])){
            include ('delete_payment.php');
        }
        if(isset($_GET['list_users'])){
            include ('list_users.php');
        }
        if(isset($_GET['delete_user'])){
            include ('delete_user.php');
        }
    ?>
    </div>
    
    <div class="bg-info p-3 text-center">
        <p>All rights reserved &copy - Designed by Pramodhini-2023</p>
    </div>
</div>



<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
</body>
</html>