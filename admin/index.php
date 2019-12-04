<?php
ob_start();
session_start();
// if($_SESSION['admin']!='')
// {
//   header("location:dashboard.php");
// }
include("dbhandler.php");
// if($dbhandler=='')
// {
//  echo "Connection Failed ".mysql_connect_error();
// }
// else
// {
//  echo "Connection established ";
// }

if(isset($_POST['submit']))
{
    extract($_POST);
    $valid="select * from user where `email`='$email' and `password`='$pwd'";
    $valid_user=mysqli_query($dbhandler,$valid);
    $no_user=mysqli_num_rows($valid_user);
if($no_user==1)
{

  echo "valid user";
  $arr =mysqli_fetch_assoc($valid_user);
  $_SESSION['admin']=$arr['id'];
  header("location:dashboard.php");
  //$_SESSION['admin']=$arr['id'];
  //header("location:validpage.php");
}
else
{
  echo "invalid username or password";
}
}
?>
<html>
<head>
  <script type="text/javascript" src="../codes/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../codes/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../codes/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../codes/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../codes/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../codes/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>LOGIN</b>SING UP</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form  method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" id="email" placeholder="Email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" id="pwd" placeholder="Password" name="pwd">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" id="submit" name="submit">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div>
    <!-- /.social-auth-links -->

    <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="../codes/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../codes/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../codes/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
  
 <!--  $(document).ready(function(){

  //  alert();

  // });
 -->
<script type="text/javascript">
  
$("#submit").click(function(){

  var email = $("#email").val();
  var pwd   =$("#pwd").val();

  if(email == '')
  {
    alert('Enter email');
    $("#email").focus();
    return false;
  }

  if(pwd == '')
  {
    alert('Enter password');
    $("#pwd").focus();
    return false;
  }
});

</script>

<script>
  $(function () {
    $('#example1').DataTable()
   
  })
</script>
