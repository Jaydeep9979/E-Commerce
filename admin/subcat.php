<?php
session_start();
global $edit;
if($_SESSION['admin'] == '')
{
  header("location:index.php");
}

ob_start();
include("dbhandler.php");
include("header.php");
include("sidebar.php");
extract($_POST);
$select_qry="select * from category";
$select_res_qry=mysqli_query($dbhandler,$select_qry);
$select_sub="select * from subcat";
$select_res_sub=mysqli_query($dbhandler,$select_sub);
if(!empty($_GET['subcat_did']))
{
  $delete="delete from subcat where subcatid=".$_GET['subcat_did'];
  $delete_qry=mysqli_query($dbhandler,$delete);
  header("location:subcat.php");
}

//join methode
// $cqry="select * from sub_cat as sc join category  as c where sc.cat_id=c.cat_id";
// $res_cqry=mysqli_query($conn,$cqry);

 if(!empty($_GET['subcat_eid']))
  {
  $edit_qry="select * from subcat where subcatid=".$_GET['subcat_eid'];
  $editqry=mysqli_query($dbhandler,$edit_qry);
  $edit=mysqli_fetch_assoc($editqry);
  $mycat="select * from category where id=".$edit['cat_id'];
  $mycat_qry=mysqli_query($dbhandler,$mycat);
  $cat=mysqli_fetch_assoc($mycat_qry);

  }

if(isset($_POST['submit']))
{
    
    if($_GET['subcat_eid']!='')
    {
      $update="update subcat set `subcat`='$subcat',`cat_id`='$category' where subcatid=".$_GET['subcat_eid'];
      $update_qry=mysqli_query($dbhandler,$update);
      

      
    } 
    else
    {

    $qry="insert into subcat(`cat_id`,`subcat`) values('$category','$subcat')";
    $i_qry=mysqli_query($dbhandler,$qry);
   }
   header("location:subcat.php");
}



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
        <li class="active">Sub Category Name</li>
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
              <h3 class="box-title">INSERT SUBCATEGORY</h3>
            </div>
           
            <form method="post">

              <div class="form-group"><br><br>
                  <div class="box-body">
                  <label>Select Category</label>

                  <select name="category" style="width:100%;">
                    <?php
                    
                    while($arr=mysqli_fetch_assoc($select_res_qry))
                    {
                       if($_GET['subcat_eid']!='')
                       {
                      
                    ?>
                    
                   <option value="<?php echo $cat['catgory'] ?>" <?php if($cat['catgory']==$arr['catgory']){echo "selected";}?>><?php echo $arr['catgory']?></option>
                     
                   
                    <?php
                    }
                    else
                    {
                    ?>
                       <option value="<?php echo $arr['id'] ?>"><?php echo $arr['catgory']?></option>
                      

                    <?php
                    }
                  }
                  ?>
                  </select>
                </div>
                </div>
              
                <div class="form-group">
                  <div class="box-body">
                  <label for="exampleInputEmail1">Sub category</label>
                  <input type="text" class="form-control" id="subcat"  value="<?php echo $edit['subcat']; ?>" placeholder="Enter Subcategory" name="subcat">
                </div> 
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary" id="submit" name="submit">Submit</button>
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
                  <th>Subcat_id</th>
                  <th>Cat_name</th> 
                  <th>Subcat</th>
                  <th>Action</th>
                </tr>
                </thead>
               <tbody>
                <?php
                while( $arr=mysqli_fetch_assoc($select_res_sub))
                {
                  ?>
                 <tr>
                  <td><?php echo $arr['cat_id']?></td>
                  <td> <?php echo $arr['subcatid']?>
                  
                  </td>
                  <?php $m="select * from category where id=".$arr['cat_id'];
                        $n=mysqli_query($dbhandler,$m);
                        $b=mysqli_fetch_assoc($n);

                  ?>
                  <td><?php echo $b['catgory']; ?></td>
                  <td>
                    <?php echo $arr['subcat']?>
                  </td>
                  <td><a class="btn btn-info" href="subcat.php?subcat_eid=<?php echo $arr['subcatid']; ?>" ><i class="fa fa-edit"></i></a> &nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-danger" href="subcat.php?subcat_did=<?php echo $arr['subcatid']; ?>" ><i class="fa fa-trash"></i></a></td>
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

  var cat = $("#subcat").val();

  if(cat == '')
  {
    alert('Enter sub Category');
    $("#subcat").focus();
    return false;
  }
});

</script>

<script>
  $(function () {
    $('#example1').DataTable()
   
  })
</script>