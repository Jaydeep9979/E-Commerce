
<?php
session_start();
include("dbhandler.php");

	if(!isset($_SESSION['addtocart']))
	{
		$addtocart=array($_POST['addtocart']);
		$_SESSION['addtocart']=$addtocart;
	}
	else
	{
		if(!in_array($_POST['addtocart'],$_SESSION['addtocart']))
		{
			array_push($_SESSION['addtocart'],$_POST['addtocart']);

		}
		
	}
	
	$value=$_POST['addtocart'];
	$cust_id=$_SESSION['customer'];
	 $insert="insert into cart(`user_id`,`pr_id`,`qty`) values($cust_id,$value,1)";
      $viewcart=mysqli_query($dbhandler,$insert);
	

?>