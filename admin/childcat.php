<?php
ob_start();
session_start();
global $edit;
if($_SESSION['admin']=='')
{
  header("location:index.php");
}
  include("dbhandler.php");


extract($_POST);

$select_qry="select * from category";
$select_res_qry=mysqli_query($dbhandler,$select_qry);

$select_qry1="select * from subcat";
$select_res_qry1=mysqli_query($dbhandler,$select_qry1);

if(!empty($_GET['childcat_did']))
{
  $delete="delete from childcat where childcatid=".$_GET['childcat_did'];
  $delete_qry=mysqli_query($dbhandler,$delete);
  header("location:childcat.php");
}

 if(!empty($_GET['childcat_eid']))
  {
      $edit_qry="select * from childcat where childcatid=".$_GET['childcat_eid'];
      $editqry=mysqli_query($dbhandler,$edit_qry);
      $edit=mysqli_fetch_assoc($editqry);
      $mycat="select * from subcat where id=".$edit['subcatid'];
      $mycat_qry=mysqli_query($dbhandler,$mycat);
      $cat=mysqli_fetch_assoc($mycat_qry);
  }

if(isset($_POST['submit']))
{
  if($_GET['childcat_eid'])
  {
    $update="update childcat set `catid`='$category',`subcatid`='$subcategory',`childcat`='$childcat' where childcatid=".$_GET['childcat_eid'];
    $u_res=mysqli_query($dbhandler,$update);
  }
  else
  {
    $qry="insert into childcat(`catid`,`subcatid`,`childcat`) values('$category','$subcategory','$childcat')";
    $res=mysqli_query($dbhandler,$qry);
  }
  header("location:childcat.php");
}

$my_join="Select * from childcat join subcat on childcat.subcatid=subcat.subcatid join category on category.id=subcat.cat_id";
$join_res=mysqli_query($dbhandler,$my_join);

  include("header.php");
  include("sidebar.php");

?>
<div class="content-wrapper">
   
    <section class="content-header">
      <h1>
         Sub Category
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Child Category Name</li>
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
              <h3 class="box-title">INSERT CHILDCATEGORY</h3>
            </div>
           
            <form method="post">

              <div class="form-group"><br><br>
                  <div class="box-body">
                  <label>Select Category</label>

                  <select name="category" id="cat_id" style="width:100%;">
                    <?php
                    while($arr=mysqli_fetch_assoc($select_res_qry))
                    {
                    ?>
                      <option value="<?php echo $arr['id']; ?>" <?php if($arr['id']==$edit['catid']){ echo "selected";} ?>><?php echo $arr['catgory'];?></option>
                    <?php
                    }
                    ?>
                   
                    
                 
                  </select>
                </div>
                </div>
               <div class="form-group"><br><br>
                  <div class="box-body">
                  <label>Select Sub-Category</label>
                 
                  <select name="subcategory" id="sub_id" style="width:100%" >
                    <?php
                    if($_GET['childcat_eid']!='')
                      
                    {
                        $edit1="select * from subcat where cat_id=".$edit['catid'];
                        $mn=mysqli_query($dbhandler,$edit1);
                        while ($arr3=mysqli_fetch_assoc($mn)) {
                     ?>
                   
                   <option value="<?php echo $arr3['subcatid'];?>" <?php if($edit['subcatid']==$arr3['subcatid']){ echo "selected";} ?>><?php echo $arr3['subcat']; ?></option>
                                      
                   <?php
                    }
                  }   
                   ?>
                  </select>
                   
                </div>
                </div>
              
                <div class="form-group">
                  <div class="box-body">
                  <label for="exampleInputEmail1">Child category</label>
                  <input type="text" class="form-control" id="childcat"  value="<?php echo $edit['childcat']; ?>" placeholder="Enter Child-category" name="childcat">
                </div> 
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" id="submit" name="submit">Submit</button>
              </div>
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
                  
                  <th>childcat_id</th>

                  <th>Category</th> 
                  <th>Subcategory</th>
                  <th>Child category</th>
                  <th>Action</th>
                </tr>
                </thead>
               <tbody>
                <?php 
                while($join=mysqli_fetch_assoc($join_res))
                {
                ?>


                <tr>
                  <td><?php echo $join['childcatid']; ?> </td>
                  <td><?php echo $join['catgory']; ?> </td>
                  <td><?php echo $join['subcat']; ?> </td>
                  <td><?php echo $join['childcat']; ?> </td>
                  

                            
                  <td><a class="btn btn-info" href="childcat.php?childcat_eid=<?php echo $join['childcatid']; ?>" ><i class="fa fa-edit"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="childcat.php?childcat_did=<?php echo $join['childcatid']; ?>" ><i class="fa fa-trash"></i></a></td>
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

  var cat = $("#childcat").val();

  if(cat == '')
  {
    alert('Enter child Category');
    $("#childcat").focus();
    return false;
  }
});



$("#cat_id").change(function(){

  var id = $(this).val();
 
  $.ajax({
    type:'post',
    url:'ajax.php',
    data:{id:id},
    success:function(response)
    {
       $("#sub_id").html(response);
    }
   
  });

});
</script>
<script>
  $(function () {
    $('#example1').DataTable()
   
  })
</script>