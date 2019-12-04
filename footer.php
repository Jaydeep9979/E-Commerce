<?php


    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 

ob_start();
include("dbhandler.php");
    extract($_POST);
    if(isset($_POST['register']))
    {
        $password=password_hash($password,PASSWORD_BCRYPT);
        // echo $password;
       // echo"<br>";
       //  echo strlen($password);
         $insert="insert into customer(`f_name`,`l_name`,`email`,`mobile_no`,`password`) values('$firstname','$lastname','$email',$phoneno,'$password')";

        $ins=mysqli_query($dbhandler,$insert);
         
     }



// include("GoogleAPI/gpConfig.php");
// include("GoogleAPI/user.php");

//         if(isset($_GET['code'])){
//             $gClient->authenticate($_GET['code']);
//             $_SESSION['token'] = $gClient->getAccessToken();
//             header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
//         }

//         if (isset($_SESSION['token'])) {
//             $gClient->setAccessToken($_SESSION['token']);
//         }

//         if ($gClient->getAccessToken()) {
//             //Get user profile data from google
//             $gpUserProfile = $google_oauthV2->userinfo->get();
//             echo "<pre>";
//             print_r($gpUserProfile);
            
//             //Initialize User class
//             $user = new User();
            
//             //Insert or update user data to the database
//             $gpUserData = array(
//                 'first_name'    => $gpUserProfile['given_name'],
//                 'last_name'     => $gpUserProfile['family_name'],
//                 'email'         => $gpUserProfile['email'],
                
//             );
            
//             $userData = $user->checkUser($gpUserData);
            
//             //Storing user data into session
//             $_SESSION['customer'] = $userData;
            
           
//         } 
//         else 
//         {
//             $authUrl = $gClient->createAuthUrl();
//             $output = '<a href="'.filter_var($authUrl, FILTER_SANITIZE_URL).'"><img src="images/glogin.png" alt=""/></a>';
//         }    
?>

    <div class="social-media-section">
        <ul class="social-wrap">
            <li><a href="#" class="fb"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#" class="insta"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#" class="google"><i class="fa fa-google-plus"></i></a></li>
            <li><a href="#" class="skype"><i class="fa  fa-skype"></i></a></li>
            <li><a href="#" class="youtube"><i class="fa fa-youtube-play"></i></a></li>
            <li><a href="#" class="linkedin"><i class="fa fa-linkedin "></i></a></li>
            <li><a href="#" class="pinterest"><i class="fa fa-pinterest-p"></i></a></li>
        </ul>
    </div>
   <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="footer-link">
                        <div class="logo">
                            <a href="index.html">
                                <img src="codes/front/images/logo.png" class="img-responsive">
                            </a>
                        </div>
                        <ul>
                           
                            <li><a href="#"><i class="fa fa-phone"></i>+91 9979038583</a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i>jaydeep9979@gmail.com</a></li>
                            <li><a href="#"><i class="fa fa-map-marker"></i>Navsari-396450</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="footer-link">
                        <p class="title">Contact Link</p>
                        <hr>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">privacy policy</a></li>
                            <li><a href="#">FAQ</a></li>
                        </ul>
                    </div>
                </div>


                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="footer-link">
                        <p class="title">Contact Link</p>
                        <hr>
                        <ul>
                            <li><a href="listing">Men Wear</a></li>
                            <li><a href="listing">Women Wear</a></li>
                            <li><a href="listing">Kids Wear</a></li>
                            <li><a href="listing">Women Wear</a></li>
                            <li><a href="listing">Kids Wear</a></li>
                            <li><a href="listing">Women Wear</a></li>
                            <li><a href="listing">Kids Wear</a></li>

                        </ul>
                    </div>
                </div>

                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="footer-link">
                        <p class="title">Subscribe Newsletter</p>
                        <hr>
                        <p>Subscribe our newsletter and daily updated to our offer mail</p>
                        <div class="input-group">
                            <input type="email" class="form-control" placeholder="Enter your email">
                            <span class="input-group-btn">
                                <button class="btn btn-theme" type="submit">Subscribe</button>
                            </span>
                        </div>
                        <div class="payment-mode mt-15">
                            <img src="codes/front/images/payment.png" class="img-responsive">    
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="copyright-content">
                        <p>All right reserved by Ecommece. Design and developed by <a href="#">Jaydeep Mahajan & Raj Panchal</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!----------Login Modal-------------->
    <div id="login-popup" class="modal fade login_signup_popup" data-backdrop="static" data-keyboard="false" style="display: none;">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <div class="modal-body">
                <div class="login-signup">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="login" id="loginForm" style="display: block;">
                                <div class="title">
                                    <div class="dart-headingstyle-one  text-center">
                                        <h3 class="dart-heading">Sign In</h3>
                                    </div>
                                </div>
                                <div class="login-box">
                                    <form name="loginform" id="loginform" method="post">
                                        <div id="signinErr" style="color:red;display:none;text-align:center;"></div>
                                        <div class="form-group">
                                            <input type="text" id="loginemail" name="loginemail" class="form-control" placeholder="Email Address" maxlength="30"> </div>
                                        <div class="form-group">
                                            <input type="Password" id="loginpassword" name="loginpassword" class="form-control" placeholder="Password" maxlength="30"> </div>
                                        <div class="form-button">
                                            <button type="button" class="submit btn-primary" id="login" name="submit">Log In</button> <a href="#" class="help-link right forgot-link" onclick="forgotPwd();">Forgot Password ?</a> </div>
                                        <div class="social-sign-in">
                                            <h3 class="sub-heading">Or Sign in Using </h3>
                                            <ul>
                                                <li class="socialMediaFbBtn"><a href="#" onclick="fbLogin();"><i class="fa fa-facebook-f"></i></a></li>
                                               
                                                <li class="socialMediaGmailBtn"><a href="<?php echo filter_var($authUrl, FILTER_SANITIZE_URL);?>" onclick="loginGmail()"><i class="fa fa-google-plus"></i></a></li>
                                                <li class="socialMediaInstaBtn" style="display: none;"><a href=""><i class="fa fa-instagram"></i></a></li>
                                                <li class="socialMediaPintrestBtn" style="display: none;"><a href="#" ><i class="fa fa-pinterest"></i></a></li>
                                                <li class="socialMediaLinkedinBtn" style="display: none;"><a href="#" ><i class="fa fa-linkedin-square"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="form-links loadPopupLink">New to Cloth store ? <a class="help-link signup-btn" onclick="loginPopup1()">Sign up</a></div>
                                    </form>
                                </div>
                            </div>

                            <div class="signup" id="signupForm" style="display: none;">
                                <div class="title">
                                    <div class="dart-headingstyle-one  text-center">
                                        <h3 class="dart-heading">Create A New Account</h3>
                                    </div>
                                </div>
                                <div class="signup-box">
                                    <form onsubmit="return registerUser(this)" name="registerform" id="registerform" method="post" style="display: block;">
                                        <div id="registerErr" style="color:red;display:none;text-align:center;"></div>
                                        <!--<input type="hidden" name="instauserid" id="instauserid">-->
                                        <input type="hidden" name="socialmediaid" id="socialmediaid">
                                        <input type="hidden" name="social_type" id="social_type">
                                        <input type="hidden" name="instausername" id="instausername">

                                        <input type="hidden" name="check_is_cart_active" class="check_is_cart_active" value="1">
                                        <input type="hidden" name="check_is_wishlist_active" class="check_is_wishlist_active" value="1">

                                        <div class="form-group">
                                            <input type="text" name="firstname" id="firstname" class="form-control " placeholder="First Name" maxlength="30"> </div>
                                        <div class="form-group">
                                            <input type="text" name="lastname" id="lastname" class="form-control " placeholder="Last Name" maxlength="30"> </div>
                                        <div class="form-group">
                                            <input type="email" name="email" id="email" class="form-control " placeholder="Email Address" maxlength="30"> </div>
                                        <div class="form-group">                                                                                                                                                                                                                                    
                                        <div class="form-group">
                                            <input type="number" name="phoneno" id="phoneno" class="form-control " placeholder="Phone Number"> </div>
                                        <div class="form-group">
                                            <input type="Password" name="password" id="password" class="form-control " placeholder="Password" maxlength="30"> </div>
                                         <div class="form-group">
                                            <input type="Password" name="confirmpassword" id="confirmpassword" class="form-control" placeholder="Confirm Password" maxlength="30"> </div> 
                                        <div class="form-links">
                                            <button type="submit" class="submit btn-primary" name="register" >Register</button>
                                        </div>
                                        <div class="form-links">Existing User? <a href="#" class="help-link left signin-btn" onclick="loginPopup2()">Sign In</a> </div>
                                    
                                    <div id="loginLink" style="display:none;">
                                        <div class="msgcenteralign">Thank you for your details</div>
                                        <div class="msgcenteralign">You have successfully registered with Clothstore.com.</div>
                                        <div class="msgcenteralign">Kindly <a href="#" onclick="loginPopup2()" class="successmsg-link">click here</a> for login </div>
                                    </div>
                                </div></form>
                            </div>
                        </div>

                            <!--otp generate-->
                            <div class="otp-generate" id="otp-div" style="display:none;">
                                <div class="title text-center">
                                    <h4 class="dart-heading otp-head">Please enter an OTP sent on your registered Mobile No./Email Id</h4></div>
                                <div style="text-align:center;display:none;color:green;" id="otpSucc"></div>
                                <div style="text-align:center;display:none;color:red;" id="otpErr"></div>
                                <div class="form-box" id="otpGeneratePanel">

                                    <form name="otpverifyform" id="otpverifyform" method="post">
                                        <input type="hidden" name="otp_token" id="otp_token">
                                        <div class="form-group">
                                            <input type="text" id="otp" name="otp" class="form-control" placeholder="Enter OTP" maxlength="6"> </div>
                                        <div class="form-links verifybtns">

                                            <button type="button" class="btn btn-md btn-black" id="otp-btn">Verify</button>
                                        </div>
                                        <div class="form-links verifybtns">Didn't receive an OTP?<a href="#" class="help-link left signin-btn" id="resend-otp-btn">Resend</a> </div>
                                    </form>
                                    <div id="verifyLink" style="display:none;">
                                        <div class="msgcenteralign">Thank you for your details</div>
                                        <div class="msgcenteralign">You have successfully registered with this site.</div>
                                        <div class="msgcenteralign">Kindly <a href="#" onclick="loginPopup2()" class="successmsg-link">click here</a> for login </div>
                                    </div>
                                </div>
                            </div>
                            <!--otp generate-->

                            <div class="reset-pwd" id="resetPwd" style="display:none;">
                                <div class="title text-center">
                                    <h3 class="dart-heading">Reset Password</h3>

                                </div>
                                <div style="text-align:center;display:none;color:red;" id="newpwdMsgErr"></div>
                                <div style="text-align:center;display:none;" id="newpwdMsgSucc"></div>
                                <div class="reset-pwd-form">
                                    <form onsubmit="return resetPassword(this)" name="resetpwdform" id="resetpwdform" method="post">
                                        <input type="hidden" name="rpwduserid" id="rpwduserid">
                                        <input type="hidden" name="rpwdemail" id="rpwdemail">
                                        <input type="hidden" name="rpwdforgot_pw_token" id="rpwdforgot_pw_token">
                                        <div class="form-group">
                                            <input type="Password" name="newpassword" id="newpassword" class="form-control" placeholder="New Password" maxlength="30">
                                        </div>
                                        <div class="form-group">
                                            <input type="Password" name="confirmnewpassword" id="confirmnewpassword" class="form-control" placeholder="Confirm new Password" maxlength="30">
                                        </div>
                                        <div class="form-links">
                                            <button type="submit" class="submit btn-primary">Reset Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div id="thankyou-div" style="display:none;">
                                <div class="title text-center">
                                    <h2 class="dart-heading">Thank You</h2>
                                </div>
                                <div class="form-box">
                                    <div style="text-align: center;">Thank you for your details</div>
                                    <div style="text-align: center;">You have successfully registered with this site.</div>
                                    <div style="text-align: center;">Kindly <a href="#" onclick="loginPopup2()">click here</a> for login </div>
                                </div>
                            </div>

                            <div class="forgot-pwd" id="forgotPwd" style="display: none;">
                                <div class="title text-center">
                                    <h3 class="dart-heading">Forgot Password</h3>
                                </div>
                                <div style="text-align:center;display:none;color:green;" id="fpwdMsgSucc"></div>
                                <div style="text-align:center;display:none;color:red;" id="fpwdMsgErr"></div>
                                <div class="form-box" id="forgotPanel" style="display: block;">
                                    <form onsubmit="return forgotPassword(this)" name="forgotpwdform" id="forgotpwdform" method="post">
                                        <div class="form-group">
                                            <input type="text" id="useremail" name="useremail" class="form-control" placeholder="Email Address" maxlength="255"> </div>
                                        <div class="form-links">
                                            <button type="submit" class="submit btn-primary">Get Password</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
   
    
    <script type="application/javascript" src="codes/front/js/bootstrap.min.js"></script>
    <script type="application/javascript" src="codes/front/js/jquery.flexslider.js"></script>
    <script type="application/javascript" src="codes/front/js/slick.min.js"></script>
    <script type="text/javascript" src="codes/front/js/owl.carousel.min.js"></script>
    <script type="application/javascript" src="codes/front/js/user-jquery.js"></script>
    


</body>
   
</html>
<script type="text/javascript">

 
   
$("#login").click(function(){


var username=$("#loginemail").val();
var password=$("#loginpassword").val();
//alert(username);
// alert(password);
$.ajax({
    type:'post',
    url:'verify.php',
    data:{username:username,password:password},
    success:function(response)
    {   
            if(response!='')
            {   
                alert(response); 
             location.reload();
            }
            else
            {
                alert(response);
            }
    }
    });

});

</script> 

