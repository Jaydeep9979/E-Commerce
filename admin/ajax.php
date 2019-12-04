<?php
include("dbhandler.php");

	if($_POST['id'])
	{
		$qry="select * from subcat where cat_id=".$_POST['id'];
		$res=mysqli_query($dbhandler,$qry);
		$html="";
		while($arr=mysqli_fetch_assoc($res))
			{
				$html.='<option value="'.$arr['subcatid'].'" >'.$arr['subcat'].'</option>';
			}
		echo $html;
	}
?>