<?php 
include("dbhandler.php");

if(!empty($_POST['offset']))
{
    $offset=$_POST['offset'];
    $find="select * from product limit $offset,4";
}
else
{
$find="select * from product limit 0,4";
}
$res=mysqli_query($dbhandler,$find);
while($arr=mysqli_fetch_assoc($res))
{


?>
                   <div class="col-md-3 col-sm-4 col-xs-12">
                        <div class="product-item">
                            <img src="admin/productimg/<?php echo $arr['banner_img']; ?>" class="img-responsive">
                            <div class="overlay">
                                <div class="product-content">
                                    <a class="product-name" href="product-detail.php?prd_id=<?php echo $arr['product_id'];?>"><?php echo $arr['product_name'];?></a>
                                    <div class="rating-section">
                                        <ul>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star"></i></li>
                                            <li><i class="fa fa-star-o"></i></li>
                                        </ul>
                                    </div>
                                    <div class="price-section text-center">
                                        <span class="price"><i class="fa fa-rupee"></i></span>
                                        <span class="price original-price"><i class="fa fa-rupee"></i><?php echo $arr['product_price'];?></span>
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

<?php
}
?>