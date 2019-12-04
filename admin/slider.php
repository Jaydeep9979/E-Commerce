<?php 
ob_start();
session_start();
global $result;
if($_SESSION['admin']=='')
{
	 header("location:index.php");

}
include("dbhandler.php");
include("header.php");
include("sidebar.php");


	
	extract($_POST);
	
	if(isset($_POST['submit']))
	{
		$image=$_FILES['file']['name'];
		if($_GET['slider_eid']!='')
		{

			$select1="select * from slider where sid=".$_GET['slider_eid'];
			$res1=mysqli_query($dbhandler,$select1);
			$result1=mysqli_fetch_assoc($res1);
			
			// $image=$_FILES['file']['name'];
			 if($image!='')
			 {
			 	move_uploaded_file($_FILES['file']['tmp_name'],"sliderimage/".$image);

			 }
			 else
			 {
			 	$image=$result1['file'];
			 //	move_uploaded_file($_FILES['file']['tmp_name'],"sliderimage/".$image);
			 }
			$update="update slider set `slider`='$slider',`discription`='$desc',`file`='$image' where sid=".$_GET['slider_eid'];
			$update_res=mysqli_query($dbhandler,$update);
		

		}
		else
		{
			 
			 if($image!='')
			 {
			 	move_uploaded_file($_FILES['file']['tmp_name'],"sliderimage/".$image);
			 }
			 $qry="insert into slider(`slider`,`discription`,`file`) values('$slider','$desc','$image')";
		     $i_qry=mysqli_query($dbhandler,$qry);
	 	}
	     header("location:slider.php");
 	}

    if(!empty($_GET['slider_did']))
	{
		$d_qry="select * from slider where sid=".$_GET['slider_did'];
		$del=mysqli_query($dbhandler,$d_qry);
		$arr1=mysqli_fetch_assoc($del);
		unlink("sliderimage/".$arr1['file']);

		$mydelete=$_GET['slider_did'];
		$delete="delete from slider where sid=".$mydelete;
		$delete_query=mysqli_query($dbhandler,$delete);

		header("location:slider.php");
	}
	if(!empty($_GET['slider_eid']))
		{

			$select="select * from slider where sid=".$_GET['slider_eid'];
			$res=mysqli_query($dbhandler,$select);
			$result=mysqli_fetch_assoc($res);
		}

	
	if(!empty($_GET['eid']) && $_GET['status']==1)
	{
			$mystatus="update slider set `status`=1 where sid=".$_GET['eid'];
			$status=mysqli_query($dbhandler,$mystatus);
			header("location:slider.php");
	}
	if(!empty($_GET['eid']) && $_GET['status']==0)
	{
			$mystatus1="update slider set `status`=0 where sid=".$_GET['eid'];
			$status1=mysqli_query($dbhandler,$mystatus1);
			header("location:slider.php");
	}
?>

<div class="content-wrapper">
   
    <section class="content-header">
      <h1>
        Manage Slider

        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Category Name</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"> Manage Slider</h3>
            </div>
           
            <form role="form" method="post" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Slider</label>
                  <input type="text" class="form-control" id="slider" placeholder="Enter slider name" name="slider" value="<?php echo $result['slider'];?>" >
                </div> 
                 <div class="form-group">
                  <label for="exampleInputEmail1">Description</label>
                  <input type="text" class="form-control" id="desc" placeholder="Enter Description" name="desc" value="<?php echo $result['discription']; ?>" >
                </div> 

                 <div class="form-group">
                  <label for="exampleInputimage">Slider Image</label>
                  <input type="file" class="form-control" id="file" name="file" >
                  <?php
                  if(!empty($_GET['slider_eid']))
					{
						?>
                  <img src="sliderimage/<?php echo $result['file'];?>" height="50px" width="50px">
                  <?php 
                  	}
                  ?>
                </div> 
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"  id="submit" name="submit" >Submit</button>
              </div>
               <div class="row">
       
         <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">available Categories</h3>
            </div>
            
            <div class="box-body" width="100%"  >
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Slider_id</th> 
                  <th>Slider Name</th>
                  <th>Slider Desc</th>
                  <th>Slider_img</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
               <tbody>
                <?php
                	$select_qry="select * from slider";
	 				$select_res_qry=mysqli_query($dbhandler,$select_qry);

                while( $arr=mysqli_fetch_assoc($select_res_qry))
                {
                  ?>
                 <tr>
                 	<td> <?php echo $arr['sid']?>
                 	
                 	</td>
                  <td>
                    <?php echo $arr['slider']?>
                  </td>
                
                   <td>
                    <?php echo $arr['discription']?>
                  </td>
                    <td>
					<img src="sliderimage/<?php echo $arr['file'];?>" height="50px" width="50px">
				</td>
				<?php
				
				if($arr['status']==0)
				{
					?>
                  <td><a class="btn btn-info" href="slider.php?status=1&eid=<?php echo $arr['sid']; ?>" ><i>Active</i></a></td>
                 <?php
	             }
	             ?>
                 <?php

                 if($arr['status']==1)
				 {
				 ?>
                  <td><a class="btn btn-info" href="slider.php?status=0&eid=<?php echo $arr['sid']; ?>" ><i>Deactive</i></a></td>
                 <?php
		            }
		            ?>

                  <td><a class="btn btn-info" href="slider.php?slider_eid=<?php echo $arr['sid']; ?>" ><i class="fa fa-edit"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="slider.php?slider_did=<?php echo $arr['sid']; ?>" ><i class="fa fa-trash"></i></a></td>
                 </tr>
 
               <?php } ?>
               </tbody>
                
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

         
          <!-- /.box -->
        </div>
      
        <!-- /.col -->
      </div>
            </form>
          </div>
        </div>
      
      </div>
      <!-- /.row -->
    </section>
   
 	</div>
</div>
<?php
include("footer.php");
?>
