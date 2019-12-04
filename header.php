<?php 
session_start();
            include("dbhandler.php");
         $select_qry="select * from category";
         $select_res_qry=mysqli_query($dbhandler,$select_qry);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Cloth Store</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----- CSS File------->
    <script type="application/javascript" src="codes/front/js/jquery-3.2.1.js"></script>
    <link type="text/css" rel="stylesheet" href="codes/front/css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="codes/front/css/bootstrap-theme.min.css" />    
    <link type="text/css" rel="stylesheet" href="codes/front/css/slick-theme.css" />
    <link type="text/css" rel="stylesheet" href="codes/front/css/slick.css" />
    <link type="text/css" rel="stylesheet" href="codes/front/css/flexslider.css">
    <link type="text/css" rel="stylesheet" href="codes/front/css/font-css.css">
    <link type="text/css" rel="stylesheet" href="codes/front/css/style.css" />

    <!------Fonts--------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,500,600i,700,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Courgette" rel="stylesheet">
</head>

<body>
    <!------ Header-top  Start------>
    <div class="header-top">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-6 col-xs-12">
                    <div class="contact-detail">
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-envelope-o"></i> jaydeep9979@gmail.com</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-phone"></i> +91 9979038583</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-7 col-sm-6 col-xs-12">
                    <div class="profile-detail">
                        <ul>
                            <li>                                
                                <form id="search">
                                   <input type="search" placeholder="Search" class="fa fa-search">
                                </form>
                               
                            </li>
                            <?php if(empty($_SESSION['customer'])){?>
                            <li>
                                <a href="#" data-toggle="modal"  data-target="#login-popup"><i class="fa fa-user"></i> login</a>
                            </li>
                        <?php }?>
                        <?php
                        if(!empty($_SESSION['customer']))
                        {
                            ?>
                            <li>
                                <li class="dropdown megamenu-fw">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">My Account<span class="caret"></span></a>
                                    <ul class="dropdown-menu megamenu-content" role="menu">
                                        <li><a href="order-history.php">My Profile</a></li>
                                       <li><a href="logout.php">Log Out</a></li>
                                       <!--  <li><a href="order-history.html">Wishlist</a></li>
                                        <li><a href="order-history.html">Wallet</a></li>
                                        <li><a href="order-history.html">My Order</a></li> -->
                                    </ul>
                                </li>
                            </li>
                         <?php }?>
                            <li>
                                <a href="product-detail.php"><i class="fa fa-heart"></i>
                                    <span class="badge">9</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" id="cart"><i class="fa fa-shopping-cart"></i>
                                    <span class="badge">9</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="shopping-cart">

        <!--end shopping-cart-header -->
        <?php if(empty($_SESSION['customer']))
        {
        ?>
                <ul class="shopping-cart-items">
              <?php 
              $total=0; 

              foreach ($_SESSION['addtocart'] as $key => $value) {
                  
                  $prd="select * from product where product_id=".$value;
                  $cart1=mysqli_query($dbhandler,$prd);
              
                while($cart=mysqli_fetch_assoc($cart1))
                {
                    
                 ?>
                
                    <li class="clearfix">
                        <img src="admin/productimg/<?php echo $cart['banner_img']; ?>" alt="item1" />
                        <div class="cart-item">
                            <a class="item-name" href="product-detail.php"><?php echo $cart['product_name']; ?></a>
                            <div class="item-price">Price:<span class="price"><i class="fa fa-rupee"></i><?php echo $cart['product_price']; ?></span></div>
                            <?php $total= $total + $cart['product_price']; ?> 
                            <div class="item-quantity">Quantity:<span class="qty">1</span></div>
                        </div>
                        <a class="close"><i class="fa fa-close"></i></a>
                    </li>

              
                <?php
                      }

                    }//foreach
                ?>
                  </ul>
        <?php }
        else
        {
            ?>

                    <ul class="shopping-cart-items">
              <?php 
              $total=0; 


                $cust_id=$_SESSION['customer'];
                $verify="select * from cart where `user_id`=".$cust_id ;
                $number=mysqli_query($dbhandler,$verify);
                $arr=array();
                while($s=mysqli_fetch_assoc($number))
                {
                  $arr[]=$s['pr_id'];
                }



              foreach ($arr as $key => $value) {
                  
                  $prd="select * from product where product_id=".$value;
                  $cart1=mysqli_query($dbhandler,$prd);
              
                while($cart=mysqli_fetch_assoc($cart1))
                {
                    
              ?>
                
                    <li class="clearfix">
                        <img src="admin/productimg/<?php echo $cart['banner_img']; ?>" alt="item1" />
                        <div class="cart-item">
                            <a class="item-name" href="product-detail.php"><?php echo $cart['product_name']; ?></a>
                            <div class="item-price">Price:<span class="price"><i class="fa fa-rupee"></i><?php echo $cart['product_price']; ?></span></div>
                            <?php $total= $total + $cart['product_price']; ?> 
                            <div class="item-quantity">Quantity:<span class="qty">1</span></div>
                        </div>
                        <a class="close"><i class="fa fa-close"></i></a>
                    </li>

              
                <?php
                      }

                    }//foreach
                ?>
                  </ul>
        <?php
            }
        ?>
        <div class="shopping-cart-total">
            <span class="lighter-text">Total:</span>
            <span class="main-color-text"><i class="fa fa-rupee"><?php echo $total; ?></i></span>
        </div>
        <div class="btn-section">
           <center> <ul>
               <?php if(!empty($_SESSION['customer']))
               {
                ?>
                <li>
                    <a href="cart.php" class="btn-primary">View Cart</a>
                </li>
            <?php
            }
            else
            {?>
                 <a href="javascript:void(0);" data-toggle="modal"  data-target="#login-popup"><i class="fa fa-user"></i> login</a>
            <?php 
        }
                ?>
            
            </ul>
            </center>
        </div>
        
    </div>
    <!------- Header Start --------->

    <header>
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-3 col-xs-12">
                    <a href="index.php" class="logo">
                        <img src="codes/front/images/logo.png" class="img-responsive">
                    </a>
                </div>
                <div class="col-md-10 col-sm-9 col-xs-12">

                    <nav class="navbar navbar-default megamenu">

                        
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                        </div>

                        
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="index.php">Home <span class="sr-only">(current)</span></a></li>
                                 <?php
                                        while($arr2=mysqli_fetch_assoc($select_res_qry))
                                        {
                                    ?>
                                 <li class="dropdown megamenu-fw">
                                   
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><?php echo ucfirst($arr2['catgory']); ?><span class="caret"></span></a>
                                   
                                    <ul class="dropdown-menu megamenu-content" role="menu">
                                        <li>
                                            
                                            


                                            <div class="row">
                                                
                                                
                                               
                                          
                                               
                                                     <?php
                                                 $select_sub="select * from subcat where cat_id=".$arr2['id'];
                                                 $select_res_sub=mysqli_query($dbhandler,$select_sub);
                                                 
                                                while($sub=mysqli_fetch_assoc($select_res_sub))
                                                {


                                                ?>
                                   
                                                 <div class="col-md-3 col-sm-3 col-xs-12">
                                                    <h3 class="title"><?php echo ucfirst($sub['subcat']); ?></h3>
                                                    <ul>
                                                          <?php
                                                          $mycat="select * from childcat where subcatid=".$sub['subcatid'];
                                                            $mycat_qry=mysqli_query($dbhandler,$mycat);
                                                            while($child=mysqli_fetch_assoc($mycat_qry))
                                                            {
                                                                ?>
       
                                                        <li> <a href="listing.html"><?php echo ucfirst($child['childcat']);?> </a></li>
                                                        <?php
                                                            }
                                                            ?>
                                                      
                                                    </ul>
                                                     </div>
                                               

                                 <?php
                                    }

                                    ?>

                                               
                                       
                                            </div>
                                        

                                        </li>
                                     
                                    </ul>
                                    
                                </li>


                                 <?php
                                    }

                                    ?>
                               
                                

                            </ul>


                        </div>

                    </nav>
                </div>
            </div>
        </div>
    </header>