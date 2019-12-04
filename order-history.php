<?php
include("header.php");
?>

    <div class="container-fluid breadcums-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="filter-btn">
                        <a href="#">
                           Order History
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Order History</li>
                      </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid profile-section">
        <div class="container">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <ul class="nav nav-pills">
                    <li class="active"><a data-toggle="pill" href="#orderhistory">Order History</a></li>
                    <li><a data-toggle="pill" href="#wishlist">Wishlist</a></li>
                    <li><a data-toggle="pill" href="#myprofile">My Profile</a></li>
                    <li><a data-toggle="pill" href="#wallet">Wallet</a></li>
                </ul>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="tab-content">
                    <div id="orderhistory" class="tab-pane fade in active">
                        <div class="heading">
                            <h1>Order History</h1>
                        </div>
                        <div class=" orderhistory-section">
                            <table>
                                <thead>
                                    <th width="7%">image</th>
                                    <th width="30%">Product Name</th>
                                    <th width="10%">Price</th>
                                    <th width="15%">Payment</th>
                                    <th width="13%">Status</th>
                                    <th width="25%">Action</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="images/3.jpg" class="img-responsive">
                                        </td>
                                        <td>
                                            <a class="product-name" href="#">Cotton Shirt </a>
                                            <div class="description">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="price">
                                                 <i class="fa fa-rupee"></i> 3500
                                            </div>
                                        </td>
                                        <td>
                                            <span class="payement-mode">COD</span>
                                        </td>
                                        <td>
                                            <span class="status">Delivered</span>
                                        </td>
                                        <td>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-rotate-left"></i></a></li>
                                                <li><a href="#"><i class="fa fa-quote-left"></i></a></li>

                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="images/3.jpg" class="img-responsive">
                                        </td>
                                        <td>
                                            <a class="product-name" href="#">Cotton Shirt </a>
                                            <div class="description">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="price">
                                                 <i class="fa fa-rupee"></i> 3500
                                            </div>
                                        </td>
                                        <td>
                                            <span class="payement-mode">COD</span>
                                        </td>
                                        <td>
                                            <span class="status">Delivered</span>
                                        </td>
                                        <td>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-rotate-left"></i></a></li>
                                                <li><a href="#"><i class="fa fa-quote-left"></i></a></li>

                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="images/3.jpg" class="img-responsive">
                                        </td>
                                        <td>
                                            <a class="product-name" href="#">Cotton Shirt </a>
                                            <div class="description">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="price">
                                                 <i class="fa fa-rupee"></i> 3500
                                            </div>
                                        </td>
                                        <td>
                                            <span class="payement-mode">COD</span>
                                        </td>
                                        <td>
                                            <span class="status">Delivered</span>
                                        </td>
                                        <td>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-rotate-left"></i></a></li>
                                                <li><a href="#"><i class="fa fa-quote-left"></i></a></li>

                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="images/3.jpg" class="img-responsive">
                                        </td>
                                        <td>
                                            <a class="product-name" href="#">Cotton Shirt </a>
                                            <div class="description">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="price">
                                                 <i class="fa fa-rupee"></i> 3500
                                            </div>
                                        </td>
                                        <td>
                                            <span class="payement-mode">COD</span>
                                        </td>
                                        <td>
                                            <span class="status">Delivered</span>
                                        </td>
                                        <td>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-rotate-left"></i></a></li>
                                                <li><a href="#"><i class="fa fa-quote-left"></i></a></li>

                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="wishlist" class="tab-pane fade">
                        <div class="heading">
                            <h1>Wishlist</h1>
                        </div>
                        <div class="orderhistory-section">
                            <table>
                                <thead>
                                    <th width="7%">image</th>
                                    <th width="45%">Product Name</th>
                                    <th width="10%">Price</th>
                                    <th width="13%">Status</th>                                    
                                    <th width="25%">Action</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="images/3.jpg" class="img-responsive">
                                        </td>
                                        <td>
                                            <a class="product-name" href="#">Cotton Shirt </a>
                                            <div class="description">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="price">
                                                 <i class="fa fa-rupee"></i> 3500
                                            </div>
                                        </td>
                                        <td>
                                            <span class="status">Available</span>
                                        </td>                                        
                                        <td>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-trash-o"></i></a></li>

                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="images/3.jpg" class="img-responsive">
                                        </td>
                                        <td>
                                            <a class="product-name" href="#">Cotton Shirt </a>
                                            <div class="description">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="price">
                                                 <i class="fa fa-rupee"></i> 3500
                                            </div>
                                        </td>
                                        <td>
                                            <span class="status">Available</span>
                                        </td>
                                        <td>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-trash-o"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="images/3.jpg" class="img-responsive">
                                        </td>
                                        <td>
                                            <a class="product-name" href="#">Cotton Shirt</a>
                                            <div class="description">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="price">
                                                 <i class="fa fa-rupee"></i> 3500
                                            </div>
                                        </td>
                                        <td>
                                            <span class="status">Available</span>
                                        </td>
                                        <td>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-trash-o"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="images/3.jpg" class="img-responsive">
                                        </td>
                                        <td>
                                            <a class="product-name" href="#">Cotton Shirt </a>
                                            <div class="description">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="price">
                                                 <i class="fa fa-rupee"></i> 3500
                                            </div>
                                        </td>
                                        <td>
                                            <span class="status">Available</span>
                                        </td>
                                        <td>
                                            <ul>
                                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                                <li><a href="#"><i class="fa fa-trash-o"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="myprofile" class="tab-pane fade">
                        <div class="heading">
                            <h1>My Profile</h1>
                        </div>
                        <div class="orderhistory-section">
                            <div class="row">
                                <div class="col-md-2 col-sm-3 col-xs-12">
                                    <div class="profile-pic">
                                        <img src="images/user.png" class="img-responsive">
                                    </div>
                                </div>
                                <div class="col-md-10 col-sm-9 col-xs-12">
                                    <div class="profile-pic">
                                        <table width="100%">
                                            <tr>
                                                <td width="25%"><label>Name:</label></td>
                                                <td width="75%"><p>Sanjay Koyani</p></td>
                                            </tr>
                                                <td width="25%"><label>Email:</label></td>
                                                <td width="75%"><p>sanjaykoyanikd@gmail.com</p></td>
                                            </tr>
                                                <td width="25%"><label>Mobile Number:</label></td>
                                                <td width="75%"><p>+91 8989858684</p></td>
                                            </tr>
                                                <td width="25%"><label>Address:</label></td>
                                                <td width="75%"><p>gayatri soc., l h road suart-395006</p></td>
                                            </tr>
                                        </table>
                                        <div class="edit-profile">
                                            <ul>
                                                <li>
                                                    <a href="javascript:void(0);" class="edit">Edit</a>
                                                </li>
                                            </ul>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                            <div class="edit-profile-section">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <div class="profile-pic form-group">
                                            
                                                <input type="file" id="imgupload" class="hidden" /> 
                                                <img src="images/user.png" class="img-responsive">
                                             
                                        </div>
                                    </div>
                                    
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <input type="text" name="" placeholder="First Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <input type="text" name="" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <input type="text" name="" placeholder="Email Address">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="form-group">
                                                <input type="text" name="" placeholder="Phone Number">
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <textarea placeholder="Enter Address" rows="3"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <a href="javascript:void(0)" class="btn-primary"> Submit </a>
                                            </div>
                                        </div>
                                    
                                </div>
                            </div>
                          </div>
                    </div>
                    <div id="wallet" class="tab-pane fade">
                        <div class="heading">
                            <h1>Wallet</h1>
                        </div>
                        <div class="wallet-details">
                            <div class="row">
                                <div class="col-md-4 col-md-offset-4 col-sm-4 col-sm-offset-4 col-xs-12">
                                    <div class="ballance-section text-center">
                                        <p class="title">
                                           Wallet Ballance 
                                        </p>
                                        <p class="total-amount">
                                            <i class="fa fa-rupee"></i> 2500
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="orderhistory-section wallet-section">

                            <table>
                                <thead>
                                    <th width="10%">image</th>
                                    <th width="55%">Product Name</th>
                                    <th width="10%">Price</th>                                         
                                    <th width="25%">Action</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="images/3.jpg" class="img-responsive">
                                        </td>
                                        <td>
                                            <a class="product-name" href="#">Cotton Shirt </a>
                                            <div class="description">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="price">
                                                 <i class="fa fa-rupee"></i> 1500
                                            </div>
                                        </td>
                                        <td>
                                            <span class="status debit">DR</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="images/3.jpg" class="img-responsive">
                                        </td>
                                        <td>
                                            <a class="product-name" href="#">Cotton Shirt </a>
                                            <div class="description">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="price">
                                                 <i class="fa fa-rupee"></i> 3500
                                            </div>
                                        </td>
                                        <td>
                                            <span class="status credit">CR</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="images/3.jpg" class="img-responsive">
                                        </td>
                                        <td>
                                            <a class="product-name" href="#">Cotton Shirt </a>
                                            <div class="description">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="price">
                                                 <i class="fa fa-rupee"></i> 348
                                            </div>
                                        </td>
                                        <td>
                                            <span class="status debit">DR</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="images/3.jpg" class="img-responsive">
                                        </td>
                                        <td>
                                            <a class="product-name" href="#">Cotton Shirt </a>
                                            <div class="description">
                                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                                            </div>

                                        </td>
                                        <td>
                                            <div class="price">
                                                 <i class="fa fa-rupee"></i> 820
                                            </div>
                                        </td>
                                        <td>
                                            <span class="status credit">CR</span>
                                        </td>
                                    </tr>
                                    
                                    
                                    
                                </tbody>
                            </table>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>

 
    <?php
include("footer.php");	
    ?>