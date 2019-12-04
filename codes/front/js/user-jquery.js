$(".regular").slick({
    dots: false,
    infinite: true,
    slidesToShow: 4,
    slidesToScroll: 1,
    autoplay: true,
    arrows: true,
});
$(".testimonial-slider").slick({
    dots: false,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    arrows: true,
    responsive: {
        0: {
            items: 1,
            nav: true
        },
        600: {
            items: 1,
            nav: false
        },
        1000: {
            items: 1,
            nav: true,
            loop: false
        }
    }
});
//Shopping cart 
$("#cart").on("click", function () {
    $(".shopping-cart").fadeToggle("fast");
});

jQuery(document).ready(function () {
    $(".dropdown").hover(
        function () {
            $('.dropdown-menu', this).fadeIn("fast");
        },
        function () {
            $('.dropdown-menu', this).fadeOut("fast");
        });
});


//home-page js feature page slider
$(".feature-slide").slick({        
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow:2,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
      });

// best seller slider

$(".best-seller").slick({        
        infinite: true,
        slidesToShow: 2,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 3000,
        responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow:2,
            slidesToScroll: 1,
            infinite: true,
            dots: true
          }
        },
        {
          breakpoint: 600,
          settings: {
            slidesToShow: 2,
            slidesToScroll: 1
          }
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1
          }
        }
      ]
      });

//Testimonial Slider 


    $("#testimonial-slider").owlCarousel({
        items:2,
        itemsDesktop:[1000,2],
        itemsDesktopSmall:[979,2],
        itemsTablet:[768,1],
        pagination:false,
        navigation:true,
        navigationText:["",""],
        autoPlay:true
    });


//Filter menu
$(document).ready(function(){
    $('.filter-btn a').click(function() {
      $('.filter-section').toggle("slide");
    });
});

// QTY Update

jQuery(document).ready(function(){
    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
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

// login modal

// $("#register-modal").on( "click", function() {
//     $('#login-modal').modal('hide');
//     $('#register-modal').modal('show');  
// });
// $("#loginForm").on( "click", function() {
//     $('#register-modal').modal('hide');
//     $('#loginForm').modal('show');  
// });
function forgotPwd() {
    jQuery('#fpwdMsgErr').css('display', 'none');
    jQuery('#fpwdMsgSucc').css('display', 'none');
    jQuery('#forgotPanel').css('display', 'block');
    jQuery('#useremail').val("");

    jQuery('#forgotPwd').css('display', 'block');
    jQuery('#loginForm').css('display', 'none');
    jQuery('#thankyou-div').css('display','none');
}
function loginFromLoad() {
    //getFeaturesSettings();
    document.getElementById("signupForm").style.display = "none";
    document.getElementById("loginForm").style.display = "block";

    jQuery('#login-popup').modal('show');

    jQuery('#loginemail').val("");
    jQuery('#loginpassword').val("");

    jQuery('#signinErr').css('display', 'none');
    jQuery('#forgotPwd').css('display', 'none');
    jQuery('#thankyou-div').css('display','none');
    jQuery('#otp-div').css('display', 'none');
    jQuery('#resetPwd').css('display', 'none');

    if (typeof $.getCookie("storemailid") != "undefined" && $.getCookie("storemailid") != "") {
        jQuery('#loginemail').val($.getCookie("storemailid"));
    }
}
function loginPopup1() {
    document.getElementById("loginForm").style.display = "none";
    document.getElementById("signupForm").style.display = "block";
    jQuery('#forgotPwd').css('display', 'none');
    jQuery('#thankyou-div').css('display','none');
    jQuery('#signupForm .dart-heading').text("Create A New Account");

    jQuery('#loginLink').css('display', 'none');
    jQuery('#registerform').css('display', 'block');
    jQuery('#firstname').val("");
    jQuery('#lastname').val("");
    jQuery('#email').val("");
    jQuery('#phoneno').val("");
    jQuery('#password').val("");
    jQuery('#confirmpassword').val("");

    jQuery('#registerErr').css('display', 'none');
    loadCountryCodes();
}
function loginPopup2() {
    document.getElementById("signupForm").style.display = "none";
    document.getElementById("loginForm").style.display = "block";

    jQuery('#forgotPwd').css('display', 'none');
    jQuery('#thankyou-div').css('display','none');
    jQuery('#otp-div').css('display', 'none');
    jQuery('#signinErr').css('display', 'none');

    jQuery('#loginemail').val("");
    jQuery('#loginpassword').val("");

    if (typeof $.getCookie("storemailid") != "undefined" && $.getCookie("storemailid") != "") {
        jQuery('#loginemail').val($.getCookie("storemailid"));
    }
}

//address section add or remove
$(document).ready(function(){
    $('.shipping-detail .shipping-address .heading a').click(function() {
      $('.shipping-detail-section').toggle("slide");
      
    });
});
$(document).ready(function(){
    $('.billing-detail .billing-address .heading a').click(function() {
      $('.billing-detail-section').toggle("slide");
      $('.billing-detaill .address-section').hide();
    });
});

//edit address

$(document).ready(function(){
    $('.shipping-detail .shipping-address .address-detail  a.edit').click(function() {
      $('.shipping-detail-section').toggle("slide");
      
    });
});
$(document).ready(function(){
    $('.billing-detail .billing-address .address-detail  a.edit').click(function() {
      $('.billing-detail-section').toggle("slide");
      
    });
});


$(document).ready(function(){
    $('.shipping-detail .shipping-address .address-detail  a.delete').click(function() {
      $(this).parent().parent().parent().parent().remove();
       // $(this).closest(".address-detail").remove();
      
    });
});
$(document).ready(function(){
    $('.billing-detail .billing-address .address-detail  a.delete').click(function() {
      $(this).parent().parent().parent().parent().remove();
       // $(this).closest(".address-detail").remove();
      
    });
});

// add and remove active class
$(".shipping-detail .address-detail").click(function () {
    $(" .shipping-detail .address-detail").removeClass("active");
    $(this).addClass("active");        

});
$(".billing-detail .address-detail").click(function () {
    $(".billing-detail .address-detail").removeClass("active");
    $(this).addClass("active");        

});
// edit profile open image upload
$(function() {
    $('img').on('click', function() {
        $('#imgupload').click();
    });
});

//open edit form for profile

$(document).ready(function(){
    $('.profile-pic  a.edit').click(function() {
      $('.edit-profile-section').toggle("slide");      
    });
});