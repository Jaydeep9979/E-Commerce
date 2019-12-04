<?php
include("dbhandler.php");

	if($_POST['id'])
	{
		$qry="select * from childcat where subcatid=".$_POST['id'];
		$res=mysqli_query($dbhandler,$qry);
		$html="";
		while($arr=mysqli_fetch_assoc($res))
			{
				$html.='<option value="'.$arr['childcatid'].'" >'.$arr['childcat'].'</option>';
			}
		echo $html;
	}
?>