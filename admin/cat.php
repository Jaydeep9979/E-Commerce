<?php
session_start();
global $edit;
if($_SESSION['admin'] == '')
 {
   header("location:index.php");
 }

include("dbhandler.php");
extract($_POST);

 $select_qry="select * from category";
 $select_res_qry=mysqli_query($dbhandler,$select_qry);
 $arr2=mysqli_fetch_assoc($select_res_qry);

if(!empty($_GET['cat_did']))
{
	$mydelete=$_GET['cat_did'];
	$delete="delete from category where id=".$mydelete;
	$delete_query=mysqli_query($dbhandler,$delete);
	header("location:cat.php");
}

if(!empty($_GET['cat_eid']))
{
	$edit_qry="select * from category where id=".$_GET['cat_eid'];
 	$editqry=mysqli_query($dbhandler,$edit_qry);
 	$edit=mysqli_fetch_assoc($editqry);
 	//header("location:cat.php");
}


if(isset($_POST['submit']))
{
	if($_GET['cat_eid']!='')
	{

	$myupdate=$_GET['cat_eid'];
	$update="update category set `catgory`='$cat' where id=".$myupdate;
	$update_query=mysqli_query($dbhandler,$update);
	header("location:cat.php");


	}
	else
	{
		$qry="insert into category(`catgory`) values('$cat')";
		$res_qry=mysqli_query($dbhandler,$qry);
		header("location:cat.php");


 
	} 
}


include("header.php");
include("sidebar.php");

//$qry="insert into category(`category`) values()"
?>
  <div class="content-wrapper">
   
    <section class="content-header">
      <h1>
        Category
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
        <div class="col-md-10">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">INSERT CATEGORY</h3>
            </div>
           
            <form role="form" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Main category</label>
                  <input type="text" class="form-control" id="cat" placeholder="Enter category" name="cat" value="<?php echo $edit['catgory']; ?>">
                </div> 
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary"  id="submit" name="submit">Submit</button>
              </div>
               <div class="row">
       
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">available Categories</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body" width="100%"  >
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Cat_id</th> 
                  <th>Main</th>
                  <th>Action</th>
                </tr>
                </thead>
               <tbody>
                <?php
                while( $arr=mysqli_fetch_assoc($select_res_qry))
                {
                  ?>
                 <tr>
                 	<td> <?php echo $arr['id']?>
                 	
                 	</td>
                  <td>
                    <?php echo $arr['catgory']?>
                  </td>
                  <td><a class="btn btn-info" href="cat.php?cat_eid=<?php echo $arr['id']; ?>" ><i class="fa fa-edit"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="cat.php?cat_did=<?php echo $arr['id']; ?>" ><i class="fa fa-trash"></i></a></td>
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
    <!-- /.content -->
  </div>

  
<?php
include("footer.php");
?>

<script type="text/javascript">
  
$("#submit").click(function(){

  var cat = $("#cat").val();

  if(cat == '')
  {
    alert('Enter Category');
    $("#cat").focus();
    return false;
  }
});

</script>

<script>
  $(function () {
    $('#example1').DataTable()
   
  })
</script>