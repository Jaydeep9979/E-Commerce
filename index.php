<?php
    include("dbhandler.php");
    include("header.php");


    $qry="select * from slider where status=1";
    $res_qry=mysqli_query($dbhandler,$qry);
    

?>
   <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
           <?php
             $i=0;
            while($ifetch=mysqli_fetch_assoc($res_qry))
            {
            ?>
            
            <li data-target="#myCarousel" data-slide-to="<?php echo $i;?>" <?php if($i==0) {?> class="active" <?php }?>></li>
           
            <?php $i++; } ?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php
            $j=0;
            $res_qry1=mysqli_query($dbhandler,$qry);
            while($res_fetch=mysqli_fetch_assoc($res_qry1))
            {
               
                if($j==0)
                {
                    echo '<div class="item active">';
                }
                else
                {
                    echo '<div class="item">';
                }
            ?>
            <img src="admin/sliderimage/<?php echo $res_fetch['file'];?>" class="img-responsive" alt="Slider" >  
                <div class="slider-text" >
                    <div class="heading">
                        <h2><b><?php echo $res_fetch['slider'];?></b></h2>
                    </div>
                
                    <div class="content" >
                        <p><b><?php echo $res_fetch['discription'];?></b></p>

                        <a class="btn-primary" href="listing.php">Shop Now</a>
                    </div>
                </div>

            </div>
       <?php
                $j++;
        }
        ?>
        </div>
            

        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="fa fa-arrow-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="fa fa-arrow-right"></span>
            <span class="sr-only">Next</span>
        </a>

    </div>
       
       
</div>

    <!-------Product Section----------->
    <div class="product-section container-fluid">
        <div class="container">
            <div class=" row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="heading">
                        <h1>Our Products</h1>
                        <p class="tagline">There is no one who loves pain itself, who seeks after it and wants to have it, simply</p>
                    </div>
                </div>

            </div>

            <section class="regular slider product">
                <?php
                    $pr="select * from product order by rand() limit 4";
                    $prdres=mysqli_query($dbhandler,$pr);
                    while ($prd=mysqli_fetch_assoc($prdres)) {
                      
                 

                 ?>
                <div class="col-md-3 col-sm-4 col-xs-12">
                    <div class="product-item">
                        <img src="admin/productimg/<?php echo $prd['banner_img']; ?>" class="img-responsive">
                        <div class="overlay">
                            <div class="product-content">
                                <a class="product-name" href="product-detail.php?prd_id=<?php echo $prd['product_id']; ?>"><?php echo $prd['product_name']; ?></a>
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
                                    <span class="price"><i class="fa fa-rupee"></i></span>
                                    <span class="price original-price"><i class="fa fa-rupee"></i><?php echo $prd['product_price']; ?></span>
                                </div>
                                <div class="btn-section">
                                    <ul>
                                        <li><a class="btn-primary" href="cart.php">Add To Cart</a></li>
                                        <li><a class="btn-primary" href="checkout.php">Buy Now</a></li>
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
                <?php 
                    }
                ?>

           	<a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="fa fa-arrow-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="fa fa-arrow-right"></span>
            <span class="sr-only">Next</span>
        </a>

            </section>


        </div>

    </div>
    <!---------Banner Section ---------->
    <div class="banner-section">
        <div class="banner-images">
            <a href="listing.html">
                <img src="codes/front/images/banner-2-copy.png" class="img-responsive">
            </a>
        </div>
    </div>

    <!------- product section -------->

    <div class="product-section product-data container-fluid">
        <div class="container">
            <div class=" row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="heading">
                        <h1>All Products</h1>
                        <p class="tagline">There is no one who loves pain itself, who seeks after it and wants to have it, simply</p>
                    </div>
                </div>
            </div>

            <div class="product">
                 <div class="row" id="view">

                    <?php include("ajax_more.php"); ?>
                 </div>
      
                <div class="row" >
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="btn-section text-center mt-15">
                           
                            <button type="button" class="btn-primary" id="more" >View More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!------- Testimonial section ------->

    <div class="testimonial-section">
        <div class="container">
            <div class=" row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="heading">
                        <h1>Testimonial</h1>
                        <p class="tagline">There is no one who loves pain itself, who seeks after it and wants to have it, simply</p>
                    </div>
                </div>
            </div>
            <div class="row">

                <section class="testimonial-slider slider product">
                    <?php
                            $test="select * from test where `status`=1";
                            $res=mysqli_query($dbhandler,$test);
                            while($arr=mysqli_fetch_assoc($res))
                            {
                         ?>
                   
                        <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="testimonial-content text-center">
                            <img src="admin/testimg/<?php echo $arr['p_img'];?>" class="img-responsive">
                            <p class="name"><?php echo $arr['name'];?></p>
                            <p class="designation"><?php echo $arr['designation'];?></p>
                            <p class="content"><?php echo $arr['test_desc'];?></p>
                        
                        </div>
                    </div>
                     <?php
                        }
                         ?>

                </section>
            </div>
        </div>
    </div>

    <!------Offer Section  ---------->
    <div class="container-fluid offer-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="offer-image">
                        <img src="codes/front/images/banner-7.jpg" class="img-responsive">
                        <div class="content-section">
                            <span class="name">New Arrrival</span>
                            <p class="content">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>

                            <a class="btn-default" href="listing.php">Shop Now</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="offer-image">
                        <img src="codes/front/images/banner-9.jpg" class="img-responsive">
                        <div class="content-section">
                            <span class="name">New Arrrival</span>
                            <p class="content">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>

                            <a class="btn-default" href="listing.php">Shop Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!------- Services Section  --------->
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

    <!-------  Blog Section ----------->

    <div class="container-fluid blog-section">
        <div class="container">
            <div class=" row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="heading">
                        <h1>Blog Section</h1>
                        <p class="tagline">There is no one who loves pain itself, who seeks after it and wants to have it, simply</p>
                    </div>
                </div>
            </div>
            <div class="blog">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="blog-content">
                            <div class="image">
                                <a class="" href="#">
                                    <img src="codes/front/images/banner-4.jpg" class="img-responsive">
                                    <div class="date-section">
                                        <div class="date">28</div>
                                        <div class="month">jan</div>
                                    </div>
                                </a>
                            </div>
                            <div class="content">
                                <a class="title" href="#">
                                    Lorem lipsum dummy text
                                </a>
                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>

                                <a class="" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="blog-content">
                            <div class="image">
                                <a class="" href="#">
                                    <img src="codes/front/images/banner-4.jpg" class="img-responsive">
                                    <div class="date-section">
                                        <div class="date">28</div>
                                        <div class="month">jan</div>
                                    </div>
                                </a>
                            </div>
                            <div class="content">
                                <a class="title" href="#">
                                    Lorem lipsum dummy text
                                </a>
                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>

                                <a class="" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="blog-content">
                            <div class="image">
                                <a class="" href="#">
                                    <img src="codes/front/images/banner-4.jpg" class="img-responsive">
                                    <div class="date-section">
                                        <div class="date">28</div>
                                        <div class="month">jan</div>
                                    </div>
                                </a>
                            </div>
                            <div class="content">
                                <a class="title" href="#">
                                    Lorem lipsum dummy text
                                </a>
                                <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.</p>

                                <a class="" href="#">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="btn-section">
                            <a href="#" class="btn-primary">Go to Top</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include("footer.php");
    ?>
   
<script>

//$("#load_more").click(function(){
var offset = 4;
$(document).on('click','#more',function(){

    $.ajax({
        type:'post',
        url:'ajax_more.php',
        data:{offset:offset},
        success:function(response)
        {   
           offset+=4; 
           $("#view").append(response);
        }
    });

});


</script>