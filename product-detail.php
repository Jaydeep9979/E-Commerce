<?php
include("dbhandler.php");
include("header.php");
if($_GET['prd_id']!='')
{
    $detail="select * from product where product_id=".$_GET['prd_id'];
    $res=mysqli_query($dbhandler,$detail);
    $prd=mysqli_fetch_assoc($res);
}
?>

    <div class="container-fluid breadcums-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="filter-btn">
                        <a href="#">
                          <?php echo $prd['product_name'];?>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product Details</li>
                      </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-------   product description section ---------->

    <div class="container-fluid product-description">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <!-- <div id="photo_container">
    
                        <ul id="thumbnail">
                            <li><a href="images/image/1.jpg"><img src="images/image/thumb/1.jpg" alt="photo1" /></a></li>
                            <li><a href="images/image/2.jpg"><img src="images/image/thumb/2.jpg" alt="photo2" /></a></li>
                            <li><a href="images/image/3.jpg"><img src="images/image/thumb/3.jpg" alt="photo3" /></a></li>
                            <li><a href="images/image/4.jpg"><img src="images/image/thumb/4.jpg" alt="photo4" /></a></li>
                            <li><a href="images/image/5.jpg"><img src="images/image/thumb/5.jpg" alt="photo5" /></a></li>
                            <li><a href="images/image/6.jpg"><img src="images/image/thumb/6.jpg" alt="photo6" /></a></li>
                        </ul>
                        
                        <div id="main_photo">                        
                            <div class="img_nav">
                                <btn id="next"></btn>
                                <btn id="prev"></btn>
                            </div>
                        </div>
                        
                    </div> -->
                    <?php
                     $image=array();
                     $image=explode(',',$prd['product_imgs']);
                    ?>
                   <!--  <div class="slider slider-for">
                         <div>
                            <img src="admin/productimg/<?php echo $prd['banner_img']; ?>">
                        </div>
                    </div> -->
                     <div class="slider slider-for">
                       
                        <?php 
                        foreach ($image as $key => $value) {
                        ?>
                         <div>
                            <img src="admin/productimg/<?php echo $value; ?>">
                         </div>
                         <?php 
                        }
                        ?>


                    </div>

                    <div class="slider slider-nav">
                         <?php 
                        foreach ($image as $key => $value) {
                        ?>
                          <div>
                            <img src="admin/productimg/<?php echo $value; ?>">
                          </div>
                        <?php 
                        }
                        ?>
                        
                        
                    </div>
                    
                   

                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="product-details p-0">
                        <p class="product-name"><?php echo $prd['product_name']; ?></p>
                        <div class="rating-section">
                            <ul>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star"></i></li>
                                <li><i class="fa fa-star-o"></i></li>
                            </ul>
                        </div>
                        <div class="share-product">                            
                            <a href="#" class="share-btn"><i class="fa  fa-share-alt"></i></a>
                            <div class="share-media">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="price-section">
                            <span class="price"><i class="fa fa-rupee"></i>1300</span>
                            <span class="price original-price"><i class="fa fa-rupee"></i>1100</span>
                        </div> 
                        <div class="Details">
                            <p>
                                <?php echo $prd['product_desc'];?>
                            </p>
                        </div>
                        <div class="filter">
                            <div class="size-section">
                                <label>Size</label>                               
                                <ul>
                                    <li class="active">
                                        <a href="#">10</a>
                                    </li>
                                    <li>
                                        <a href="#">11</a>
                                    </li>
                                    <li>
                                        <a href="#">12</a>
                                    </li>
                                    <li>
                                        <a href="#">13</a>
                                    </li>
                                </ul>                                
                            </div>
                          <div class="color-section">
                                <label>Color</label>                               
                                <ul>
                                    <li class="active">
                                        <a href="#" class="red"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="green"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="yellow"></a>
                                    </li>
                                    <li>
                                        <a href="#" class="black"></a>
                                    </li>
                                </ul>                                
                            </div>
                        </div>
                        <div class="product-filter">
                            <label>QTY:</label>
                            <form id='myform' method='POST' action='#'>
                                <a value='-' class='qtyminus' field='quantity' href="#">-</a>
                                <input type='text' name='quantity' value='0' class='qty' />
                                <a value='+' class='qtyplus' field='quantity' href="#">+</a>
                            </form>
                        </div>
                        <div class="expected-delivery">
                            <label>Expected Delivery</label>
                            <input type="text" name="" placeholder="Enter Pincode">
                            <a href="#" class="view-more">Check</a>
                            <div class="expected-time">3- 5 day in delivery </div>
                        </div>
                        <div class="payment-available">
                            <label>Payment Availability</label>
                            <ul>
                                <li>
                                    <i class="fa fa-close"></i> COD
                                </li>
                                <li>
                                    <i class="fa fa-check available"></i> VISA
                                </li>
                                <li>
                                    <i class="fa fa-check available"></i>EMI
                                </li>
                            </ul>
                        </div>
                        <div class="btn-section">
                            <ul>
                                <button class="btn-primary" type="button" id="addtocart" >Add To Cart</button>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="product-details bg-gray container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#home"><?php echo $prd['product_desc']; ?></a></li>
                        <li><a data-toggle="tab" href="#menu1">Review</a></li>
                        <li><a data-toggle="tab" href="#menu2">FAQ</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active">
                            <div class="description-section">
                                 <h3>Description</h3>
                               <table>
                                   <tr>
                                       <td width="30%">
                                          <span class="name">Name</span> 
                                       </td>
                                       <td width="70%">
                                           <span class="description">Designer Dress</span>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td width="30%">
                                          <span class="name">Size</span>
                                       </td>
                                       <td width="70%">
                                          <span class="description"> XXL</span>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td width="30%">
                                           <span class="name">Material</span>
                                       </td>
                                       <td width="70%">
                                         <span class="description">  Cotton Silk</span>
                                       </td>
                                   </tr>
                                   <tr>
                                       <td width="30%">
                                          <span class="name"> warrenty</span>
                                       </td>
                                       <td width="70%">
                                         <span class="description">  1 Year</span>
                                       </td>
                                   </tr>
                               </table>
                            </div>
                        </div>
                        <div id="menu1" class="tab-pane fade">
                            <h3>Client Review </h3>
                            <div class="review-section">
                                <section class="testimonial-slider">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="testimonial-content text-center">
                                            <img src="images/user.png" class="img-responsive">
                                            <p class="name">John Steve</p>
                                            <p class="designation">Web Designer</p>
                                            <ul>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star-o"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star-o"></i>
                                                </li> 
                                            </ul>
                                            <p class="content">All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="testimonial-content text-center">
                                            <img src="images/user-2.png" class="img-responsive">
                                            <p class="name">John Steve</p>
                                            <p class="designation">Web Designer</p>
                                            <ul>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star-o"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star-o"></i>
                                                </li> 
                                            </ul>
                                            <p class="content">All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="testimonial-content text-center">
                                            <img src="images/user.png" class="img-responsive">
                                            <p class="name">John Steve</p>
                                            <p class="designation">Web Designer</p>
                                            <ul>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star-o"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star-o"></i>
                                                </li> 
                                            </ul>
                                            <p class="content">All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                                        </div>
                                    </div>


                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="testimonial-content text-center">
                                            <img src="images/user-2.png" class="img-responsive">
                                            <p class="name">John Steve</p>
                                            <p class="designation">Web Designer</p>
                                            <ul>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star-o"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star-o"></i>
                                                </li> 
                                            </ul>
                                            <p class="content">All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                                        </div>
                                    </div>


                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="testimonial-content text-center">
                                            <img src="images/user.png" class="img-responsive">
                                            <p class="name">John Steve</p>
                                            <p class="designation">Web Designer</p>
                                            <ul>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star-o"></i>
                                                </li>
                                                <li>
                                                    <i class="fa fa-star-o"></i>
                                                </li> 
                                            </ul>
                                            <p class="content">All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.</p>
                                        </div>
                                    </div>
                                </section>
                            </div>
                                
                        </div>
                        <div id="menu2" class="tab-pane fade">
                            <h3>Question Answer</h3>
                            <div class="faq-section">
                                <ul>
                                    <li>
                                        <div class="question">This Product is good or not?</div>
                                        <div class="answer">Yes, its good product.</div>
                                    </li>
                                    <li>
                                        <div class="question">This Product is good or not?</div>
                                        <div class="answer">Yes, its good product.</div>
                                    </li>

                                    <li>
                                        <div class="question">This Product is good or not?</div>
                                        <div class="answer">Yes, its good product.</div>
                                    </li>
                                    <li>
                                        <div class="question">This Product is good or not?</div>
                                        <div class="answer">Yes, its good product.</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                   <div class="heading">
                       <h2>Feature product</h2>
                   </div>
                    <section class="feature-product slider product p-0">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <img src="images/1.jpg" class="img-responsive">
                                <div class="overlay">
                                    <div class="product-content">
                                        <p class="product-name">Designer Dress</p>
                                        <div class="rating-section">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <div class="price-section text-center">
                                            <span class="price"><i class="fa fa-rupee"></i>1800</span>
                                            <span class="price original-price"><i class="fa fa-rupee"></i>1500</span>
                                        </div>
                                        <div class="btn-section">
                                            <ul>
                                                <li><a class="btn-primary" href="cart.html">Add To Cart</a></li>
                                                <li><a class="btn-primary" href="checkout.html">Buy Now</a></li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <a class="wishlist btn-primary" href="#">
                                    <i class="fa fa-heart"></i>
                                </a>
                                <div class="arrival-staus">
                                    <span class="tag">New</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <img src="images/3.jpg" class="img-responsive">
                                <div class="overlay">
                                    <div class="product-content">
                                        <p class="product-name">Designer Dress</p>
                                        <div class="rating-section">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <div class="price-section text-center">
                                            <span class="price"><i class="fa fa-rupee"></i>2400</span>
                                            <span class="price original-price"><i class="fa fa-rupee"></i>1200</span>
                                        </div>
                                        <div class="btn-section">
                                            <ul>
                                                <li><a class="btn-primary" href="cart.html">Add To Cart</a></li>
                                                <li><a class="btn-primary" href="checkout.html">Buy Now</a></li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <a class="wishlist btn-primary" href="#">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <img src="images/5.jpg" class="img-responsive">
                                <div class="overlay">
                                    <div class="product-content">
                                        <p class="product-name">Designer Dress</p>
                                        <div class="rating-section">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <div class="price-section text-center">
                                            <span class="price"><i class="fa fa-rupee"></i>1800</span>
                                            <span class="price original-price"><i class="fa fa-rupee"></i>1600</span>
                                        </div>
                                        <div class="btn-section">
                                            <ul>
                                                <li><a class="btn-primary" href="cart.html">Add To Cart</a></li>
                                                <li><a class="btn-primary" href="checkout.html">Buy Now</a></li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <a class="wishlist btn-primary" href="#">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <img src="images/7.jpg" class="img-responsive">
                                <div class="overlay">
                                    <div class="product-content">
                                        <p class="product-name">Designer Dress</p>
                                        <div class="rating-section">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <div class="price-section text-center">
                                            <span class="price"><i class="fa fa-rupee"></i>3150</span>
                                            <span class="price original-price"><i class="fa fa-rupee"></i>2500</span>
                                        </div>
                                        <div class="btn-section">
                                            <ul>
                                                <li><a class="btn-primary" href="cart.html">Add To Cart</a></li>
                                                <li><a class="btn-primary" href="checkout.html">Buy Now</a></li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <a class="wishlist btn-primary" href="#">
                                    <i class="fa fa-heart"></i>
                                </a>
                                <div class="arrival-staus">
                                    <span class="tag">20%</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <img src="images/1.jpg" class="img-responsive">
                                <div class="overlay">
                                    <div class="product-content">
                                        <p class="product-name">Designer Dress</p>
                                        <div class="rating-section">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <div class="price-section text-center">
                                            <span class="price"><i class="fa fa-rupee"></i>3500</span>
                                            <span class="price original-price"><i class="fa fa-rupee"></i>3250</span>
                                        </div>
                                        <div class="btn-section">
                                            <ul>
                                                <li><a class="btn-primary" href="cart.html">Add To Cart</a></li>
                                                <li><a class="btn-primary" href="checkout.html">Buy Now</a></li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <a class="wishlist btn-primary" href="#">
                                    <i class="fa fa-heart"></i>
                                </a>

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <img src="images/3.jpg" class="img-responsive">
                                <div class="overlay">
                                    <div class="product-content">
                                        <p class="product-name">Designer Dress</p>
                                        <div class="rating-section">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <div class="price-section text-center">
                                            <span class="price"><i class="fa fa-rupee"></i>1500</span>
                                            <span class="price original-price"><i class="fa fa-rupee"></i>1800</span>
                                        </div>
                                        <div class="btn-section">
                                            <ul>
                                                <li><a class="btn-primary" href="cart.html">Add To Cart</a></li>
                                                <li><a class="btn-primary" href="checkout.html">Buy Now</a></li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <a class="wishlist btn-primary" href="#">
                                    <i class="fa fa-heart"></i>
                                </a>
                                <div class="arrival-staus">
                                    <span class="tag">20%</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <img src="images/5.jpg" class="img-responsive">
                                <div class="overlay">
                                    <div class="product-content">
                                        <p class="product-name">Designer Dress</p>
                                        <div class="rating-section">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <div class="price-section text-center">
                                            <span class="price"><i class="fa fa-rupee"></i>5150</span>
                                            <span class="price original-price"><i class="fa fa-rupee"></i>4500</span>
                                        </div>
                                        <div class="btn-section">
                                            <ul>
                                                <li><a class="btn-primary" href="cart.html">Add To Cart</a></li>
                                                <li><a class="btn-primary" href="checkout.html">Buy Now</a></li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <a class="wishlist btn-primary" href="#">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="product-item">
                                <img src="images/7.jpg" class="img-responsive">
                                <div class="overlay">
                                    <div class="product-content">
                                        <p class="product-name">Designer Dress</p>
                                        <div class="rating-section">
                                            <ul>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                                <li><i class="fa fa-star-o"></i></li>
                                            </ul>
                                        </div>
                                        <div class="price-section text-center">
                                            <span class="price"><i class="fa fa-rupee"></i>1100</span>
                                            <span class="price original-price"><i class="fa fa-rupee"></i>1000</span>
                                        </div>
                                        <div class="btn-section">
                                            <ul>
                                                <li><a class="btn-primary" href="#">Add To Cart</a></li>
                                                <li><a class="btn-primary" href="#">Buy Now</a></li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                                <a class="wishlist btn-primary" href="#">
                                    <i class="fa fa-heart"></i>
                                </a>
                                <div class="arrival-staus">
                                    <span class="tag">New</span>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid service-section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="service text-center">
                        <i class="icon-money-back"></i>
                        <p class="name">100% MONEY BACK</p>
                        <p class="content">30 Day Money Back Guarantee.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="service text-center service-border">
                        <i class="icon-delivery-truck"></i>
                        <p class="name">FREE SHIPPING</p>
                        <p class="content">On All Orders Of USD $50</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12">
                    <div class="service text-center">
                        <i class="icon-support"></i>
                        <p class="name">24/7 SERVICE</p>
                        <p class="content">Get Help When You Need It</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!------ footer section -------->
   
    <!------- Footer Section --------->

   <?php
   include("footer.php");
   ?>

<script type="text/javascript">
  
      $('.slider-for').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.slider-nav'
});
$('.slider-nav').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    asNavFor: '.slider-for',
    dots: false,
    centerMode: true,
    focusOnSelect: true
});

//feature product
$(".feature-product").slick({
    dots: false,
    infinite: true,
    slidesToShow: 2,
    slidesToScroll: 1,
    autoplay: true,
    arrows: false,
});
</script>

<script>
   
   $("#addtocart").click(function(){
var addtocart="<?php echo $_GET['prd_id'];?>";
    $.ajax({
        type:'post',
        url:'addtocart.php',
        data:{addtocart:addtocart},
        success:function(response)
        {   
             alert("Product id added to cart , Succefully");
        }
        });

    });

</script> 