<?php 
session_start();
ob_start();
    include("dbhandler.php");
    include("header.php");

    $cust_id=$_SESSION['customer'];
    $verify="select * from cart where `user_id`=".$cust_id ;
    $number=mysqli_query($dbhandler,$verify);
    $arr=array();
    while($s=mysqli_fetch_assoc($number))
    {
      $arr[]=$s['pr_id'];
    }

   
    
    foreach ($_SESSION['addtocart'] as $key => $value)
     {
          if(!in_array($value,$arr))
          {

             $insert="insert into cart(`user_id`,`pr_id`,`qty`) values($cust_id,$value,1)";
              $viewcart=mysqli_query($dbhandler,$insert);
          }
      } 
   
    $select="select * from cart where `user_id`=$cust_id ";
    $mycart=mysqli_query($dbhandler,$select);
     
   
    

?>

    <div class="container-fluid breadcums-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="filter-btn">
                        <a href="#">
                           Product cart
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cart Details</li>
                      </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

   
    <div class="container-fluid cart-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="cart-section">
                        <table class="table-striped">
                            <thead>
                        <?php 
                          $total=0; 

                         while($arr=mysqli_fetch_assoc($mycart))
                        {                           
                            $prd="select * from product where product_id=".$arr['pr_id'] ;
                              $cart1=mysqli_query($dbhandler,$prd); 
                            while($cart=mysqli_fetch_assoc($cart1))
                            {
                                
                          ?>
                                <tr>
                                    <td>
                                        <img src="admin/productimg/<?php echo $cart['banner_img']; ?>" class="img-responsive">
                                    </td>
                                    <td>
                                        <a class="product-name" href="product-detail.php"><?php echo $cart['product_name']; ?></a>
                                        <p class="color">
                                            <label>Color:</label> <?php echo $cart['product_color']; ?>
                                        </p>
                                         <p class="size">
                                            <label>size:</label><?php echo $cart['product_size']; ?>
                                        </p>
                                    </td>
                                    <td class="text-right">
                                        <p class="price"><i class="fa fa-rupee"></i><?php echo $cart['product_price']; ?></p>
                                        <?php $total= $total + $cart['product_price']; ?> 
                                    </td>
                                    <td class="product-filter text-right">
                                        <form id='myform' method='POST' action='#' class="ml-0">
                                            <a value='-' class='qtyminus' field='quantity' href="#">-</a>
                                            <input type='text' name='quantity' value='1' class='qty' />
                                            <a value='+' class='qtyplus' field='quantity' href="#">+</a>
                                        </form>
                                    </td>
                                    <td class="text-right"><p class="price"><i class="fa fa-rupee"></i></i><?php echo $cart['product_price']; ?></p></td>
                                    <td class="text-center"><a href="#" class="remove-product"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                <?php
                                }
                          }
                                ?>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-12"> 
                     <div class="Checkout">
                          <a href="checkout.html" class="btn-primary">Check Out</a>
                     </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12"> 
                     <div class="sub-total">
                        <label>Sub Total:</label>
                        <span><i class="fa fa-rupee"></i><?php echo $total; ?></span>
                     </div>
                </div>
            </div>

        </div>
    </div>




    <!------ footer section -------->
    <?php
    include("footer.php");
    ?>