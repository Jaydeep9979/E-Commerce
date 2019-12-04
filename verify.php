<?php
    session_start();
    include('dbhandler.php');
    



        if($_POST['username']!='' && $_POST['password']!='')
        {
            $username=$_POST['username'];
            $password=$_POST['password'];
            $valid="select * from customer where `email`='$username'";
            $valid_user=mysqli_query($dbhandler,$valid);
            $no_user=mysqli_num_rows($valid_user);
            $arr =mysqli_fetch_assoc($valid_user);
            $verify=password_verify($password,$arr['password']);
            //echo $verify;
            if($no_user==1 && $verify)
            {
              echo 1;
              
              $_SESSION['customer']=$arr['customer_id'];

            }
            else
            {
              echo "invalid username or password";
            }

        }
        else
        {
            echo "Enter Email id or password";

        }

 ?>

