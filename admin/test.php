<?php
ob_start();
global $find;
include("dbhandler.php");
include("header.php");
include("sidebar.php");

	extract($_POST);
	
	$view="select * from test";
	$res=mysqli_query($dbhandler,$view);

	if(!empty($_GET['test_did']))
	{
		$delete="delete from test where test_id=".$_GET['test_did'];
		$d_fire=mysqli_query($dbhandler,$delete);

	}
	if(!empty($_GET['test_eid']))
	{
		$edit="select * from test where test_id=".$_GET['test_eid'];
		$all=mysqli_query($dbhandler,$edit);
		$find=mysqli_fetch_assoc($all);
	}

	if(!empty($_GET['eid']) && $_GET['status']==1)
	{
		$statu="update test set `status`=1 where test_id=".$_GET['eid'];
		$st=mysqli_query($dbhandler,$statu);
		header("location:test.php");
	}
	if(!empty($_GET['eid']) && $_GET['status']==0)
	{
		$statu1="update test set `status`=0 where test_id=".$_GET['eid'];
		$st1=mysqli_query($dbhandler,$statu1);
		header("location:test.php");
	}


if(isset($_POST['submit']))
{
	$image=$_FILES['test_img']['name'];
	if($_GET['test_eid']!='')
	{
			
			
				
			
			if($image!='')
			{
				move_uploaded_file($_FILES['test_img']['tmp_name'],"testimg/".$image);
				unlink("testimg/".$find['p_img']);
			}
			else
			{
				$image=$find['p_img'];
			}
			$update="update test set `name`='$test_name',`designation`='$desig',`test_desc`='$test_desc',`p_img`='$image' where test_id=".$_GET['test_eid'];
			$update_qry=mysqli_query($dbhandler,$update);
	}
	else
	{
	
			if($image!='')
			{
				move_uploaded_file($_FILES['test_img']['tmp_name'],"testimg/".$image);
			}

			$insert="insert into test(`name`,`designation`,`test_desc`,`p_img`) values('$test_name','$desig','$test_desc','$image')";
			$fire=mysqli_query($dbhandler,$insert);
	}	

	header("location:test.php");
}

?>
<div class="content-wrapper">
   
    <section class="content-header">
      <h1>
         Testimonial
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">testimonial Name</li>
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
              <h3 class="box-title">ADD Testimonial DETAILS</h3>
            </div>
           
            <form method="post" enctype="multipart/form-data">

              <div class="form-group"><br><br>
                  <div class="box-body">

                  
                 
                
                 
              
                  <div class="form-group">
                  
                    <label for="exampleInputEmail1">Testimonial</label>
                    <input type="text" class="form-control" id="product_name"  value="<?php echo $find['name'];?>" placeholder="Enter Product Name " name="test_name">
                  </div> 
              
              
                  <div class="form-group">
                  
                    <label for="exampleInputEmail1">Testimonial's Designation</label>
                    <input type="text" class="form-control" id="product_size" value="<?php echo $find['designation'];?>"   placeholder="Enter designation" name="desig">
                  </div> 
         
                 <div class="form-group">
  
                  <label for="exampleInputEmail1"> Description</label>
                   <textarea rows="4" class="form-control" cols="50" name="test_desc" ><?php echo $find['test_desc'];?>
                  </textarea>
                </div> 
            

               <div class="form-group">
                  
                  <label for="exampleInputEmail1">Choose Profile Picture</label>
                  <input type="file" class="form-control" id="product_sale"   placeholder="Choose Profile Image " name="test_img">
                  <?php
	                  if(!empty($_GET['test_eid']))
					  {
					?>
					  		<img src="testimg/<?php echo $find['p_img'];?>" height="100px" width="100px">

					<?php
					}
					?>
                   
                </div> 
              


              
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" id="submit" name="submit" >Submit</button>
              </div>
            </div>
        
            </form>
          </div>
        </div>
      
      </div>
      <!-- /.row -->
    </section>

    <div class="row">
        <div class="col-xs-12">+
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">available Child-Categories</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" width="100%"  >
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  
                
                  <th>id</th>
                  <th>Name</th> 
                  <th>Designation</th>
                  <th>Description</th>
                  <th>image</th>
                  <th>status</th>
                  <th>Action</th>
                </tr>
                </thead>
               <tbody>
                <?php 
                while($fet=mysqli_fetch_assoc($res))
                {
                ?>


                <tr>
                  <td><?php echo $fet['test_id']; ?> </td>
                  <td><?php echo $fet['name']; ?> </td>
                  <td><?php echo $fet['designation']; ?> </td>
                  <td><?php echo $fet['test_desc']; ?> </td>
                  <td><img src="testimg/<?php echo $fet['p_img'];?>" height="50px" width="50px"> </td>
                 
                  <?php

                 if($fet['status']==0)
                 {

                 	?>

                  <td><a class="btn btn-info" href="test.php?status=1&eid=<?php echo $fet['test_id']; ?>" ><i>Deactive</i></a></td>
                  <?php
	              }
	              if($fet['status']==1)
                  {
				  ?>
				  <td><a class="btn btn-info" href="test.php?status=0&eid=<?php echo $fet['test_id']; ?>" ><i>Active</i></a></td>
				  <?php
				  }
				  ?>

                            
                  <td><a class="btn btn-info" href="test.php?test_eid=<?php echo $fet['test_id']; ?>" ><i class="fa fa-edit"></i></a> &nbsp;&nbsp;&nbsp;&nbsp; <a class="btn btn-danger" href="test.php?test_did=<?php echo $fet['test_id']; ?>" ><i class="fa fa-trash"></i></a></td>
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
    <!-- /.content -->
  </div>

<?php
include("footer.php");
?>