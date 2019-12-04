<?php
ob_start();
session_start();
global $find_prd;
global $product_eid;
if($_SESSION['admin']=='')
{
  header("index.php");
}
include("dbhandler.php");
include("header.php");
include("sidebar.php");


	extract($_POST);

	$select_qry="select * from category";
	$select_res_qry=mysqli_query($dbhandler,$select_qry);

	$fetch="select * from product";
	$res=mysqli_query($dbhandler,$fetch);
	$max=array();
	$delimg=array();
    if(!empty($_GET['product_did']))
	  {
  		$d_qry="select * from product where product_id=".$_GET['product_did'];
  		$del=mysqli_query($dbhandler,$d_qry);
  		$arr1=mysqli_fetch_assoc($del);
  		$delimg=explode(',',$arr1['product_imgs']);
  		foreach ($delimg as $key => $value)
      {
  			unlink("productimg/".$value);
  		}

    	 $del="delete from product where product_id=".$_GET['product_did'];
    	 $del_qry=mysqli_query($dbhandler,$del);
    	 header("location:product.php");
	  }

	if(!empty($_GET['product_eid']))
	{
		$find_click="select * from product where product_id=".$_GET['product_eid'];
		$find=mysqli_query($dbhandler,$find_click);
		$find_prd=mysqli_fetch_assoc($find);
	}

 
		
	if(isset($_POST['submit']))
	{
		if($_GET['product_eid']!='')
		{
		    
			$img=$_FILES['banner_img']['name'];
			if($img!='')
			{
				move_uploaded_file($_FILES['banner_img']['tmp_name'],"productimg/".$img);

			}
			else
			{
				$img=$find_prd['banner_img'];
			}
			
            //multilpe images
			$multi1=array();
			if($_FILES['product_imgs']!='')
			{
					foreach ($_FILES['product_imgs']['name'] as $key => $value)
					{
						$multi1[$key]=$value;		
					}
					foreach ($_FILES['product_imgs']['tmp_name'] as $key => $value)
					{
						move_uploaded_file($value,"productimg/".$multi1[$key]);
					}
					$new_imgs_str=implode(',',$multi1);
			}
		
            $old_img_str1=explode(',',$old_img_str);
    
            $res=array_diff($old_img_str1,$old_img_arr);
            // print_r($old_img_str1);
            // print_r($old_img_arr);
            // print_r($res);
            
            if($res=='' && $old_img_arr=='')
            {
                foreach($old_img_arr as $key => $value)
                {
                    unlink("productimg/".$value);
                }
    
            }
            else
            {
                foreach($res as $key => $value)
                {
                    unlink("productimg/".$value);
                }
               
            }
            
            $old_img_string=implode(',', $old_img_arr);
            
    
            $all_img=$new_imgs_str.",".$old_img_string;
            
			$update="update product set `cat_id`=$category,`subcat_id`=$subcat,`childcat_id`=$childcat,`product_name`='$product_name',`product_size`='$product_size',`product_color`='$product_color',`product_price`=$product_price,`product_sale`=$product_sale,`product_desc`='$Product_desc',`banner_img`='$img',`product_imgs`='$all_img' where product_id=".$_GET['product_eid'];
            
            $my=mysqli_query($dbhandler,$update);
		}
		else
		{

			$img=$_FILES['banner_img']['name'];
			if($img!='')
			{
				move_uploaded_file($_FILES['banner_img']['tmp_name'],"productimg/".$img);
			}
			$multi=array();
			foreach ($_FILES['product_imgs']['name'] as $key => $value)
			{
				$multi[$key]=$value;		
			}
			foreach ($_FILES['product_imgs']['tmp_name'] as $key => $value)
			{
				move_uploaded_file($value,"productimg/".$multi[$key]);
			}
			$mulimg=implode(',',$multi);


			//$targetfolder="sliderimage/";

			$insert="insert into product(`cat_id`,`subcat_id`,`childcat_id`,`product_name`,`product_size`,`product_color`,`product_price`,`product_sale`,`product_desc`,`banner_img`,`product_imgs`) values($category,$subcat,$childcat,'$product_name','$product_size','$product_color',$product_price,$product_sale,'$Product_desc','$img','$mulimg')"; 
			
			$my=mysqli_query($dbhandler,$insert);
		}
		header("location:product.php");
	}

?>

<div class="content-wrapper">
   
    <section class="content-header">
      <h1>
         Product
        <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Forms</a></li>
        <li class="active">Product Name</li>
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
              <h3 class="box-title">ADD PRODUCT DETAILS</h3>
            </div>
           
            <form method="post" enctype="multipart/form-data">

              <div class="form-group"><br><br>
                  <div class="box-body">

                  <div class="form-group">
                    <label>Select Main Category</label>

                    <select class="form-control" name="category" id="cat_id" style="width:100%;">
                      <?php
                      while($arr=mysqli_fetch_assoc($select_res_qry))
                      {
                      ?>
                        <option value="<?php echo $arr['id']; ?>" <?php if($arr['id']==$find_prd['cat_id']){ echo "selected";} ?>><?php echo $arr['catgory'];?></option>
                      <?php
                      }
                      ?>
                   
                    </select>  
                  </div>
                  
                  <div class="form-group">
                  
                    <label>Select Sub-Category</label>
                 
                    <select class="form-control" name="subcat" id="sub_id" style="width:100%" >
                    	<?php
                    	if($_GET['product_eid']!='')
						{

								$select_qry1="select * from subcat where cat_id=".$find_prd['cat_id'];
								$select_res_qry1=mysqli_query($dbhandler,$select_qry1);

							 while($arr1=mysqli_fetch_assoc($select_res_qry1))
                    		  {
							?>
                        <option value="<?php echo $arr1['subcatid']; ?>" <?php if($arr1['subcatid']==$find_prd['subcat_id']){ echo "selected";} ?>><?php echo $arr1['subcat'];?></option>

                    	<?php
                    			}
                	    }

                    	?>

                    </select>
                   
                  </div>
                
                  <div class="form-group">
                  
                    <label for="exampleInputEmail1">Select Child Category</label>
                    <select class="form-control" name="childcat" id="child_id" style="width:100%" >
                    	<?php
                    	if($_GET['product_eid']!='')
						{

								$select_qry2="select * from childcat where subcatid=".$find_prd['subcat_id'];
								$select_res_qry2=mysqli_query($dbhandler,$select_qry2);

							 while($arr2=mysqli_fetch_assoc($select_res_qry2))
                    		  {
							?>
                        <option value="<?php echo $arr2['childcatid']; ?>" <?php if($arr2['childcatid']==$find_prd['childcat_id']){ echo "selected";} ?>><?php echo $arr2['childcat'];?></option>

                    	<?php
                    			}
                	    }

                    	?>

                    </select>
                  
                  </div> 
              
                  <div class="form-group">
                  
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" class="form-control" id="product_name"  value="<?php echo $find_prd['product_name']; ?>" placeholder="Enter Product Name " name="product_name">
                  </div> 
              
              
                  <div class="form-group">
                  
                    <label for="exampleInputEmail1">Product Size</label>
                    <input type="text" class="form-control" id="product_size" value="<?php echo $find_prd['product_size']; ?>"   placeholder="Enter Product Size " name="product_size">
                  </div> 
              

                 <div class="form-group">
                    
                    <label for="exampleInputEmail1">Product Color</label>
                    <input type="text" class="form-control" id="product_color" value="<?php echo $find_prd['product_color']; ?>"  placeholder="Enter Product Color " name="product_color">
                  </div> 
              

                 <div class="form-group">
              
                    <label for="exampleInputEmail1">Product Price</label>
                    <input type="text" class="form-control" id="product_price" value="<?php echo $find_prd['product_price']; ?>"  placeholder="Enter Product Price " name="product_price">
                  </div> 
              

                 <div class="form-group">

                    <label for="exampleInputEmail1">Product sale</label>
                    <input type="text" class="form-control" id="product_sale"  value="<?php echo $find_prd['product_sale']; ?>" placeholder="Enter Product sale " name="product_sale">
                  </div> 


                 <div class="form-group">
  
                  <label for="exampleInputEmail1">Product Description</label>
                   <textarea rows="4" class="form-control" cols="50" name="Product_desc"><?php echo $find_prd['product_desc']; ?>
                  </textarea>
                </div> 
            

               <div class="form-group">
                  
                  <label for="exampleInputEmail1">Product Banner Image</label>
                  <input type="file" class="form-control" id="product_sale"   placeholder="Choose Product Banner Image " name="banner_img">
                  <?php
                  if(!empty($_GET['product_eid']))
                  {
                    ?>
                 	<img src="productimg/<?php echo $find_prd['banner_img'];?>" height="100px" width="100px">
                  <?php
                  }
                  ?>
                </div> 
              


               <div class="form-group">
              
                  <label for="exampleInputEmail1">Product Images</label>
                  <input type="file" class="form-control" id="product_sale"   placeholder="Choose Product Images" name="product_imgs[]" multiple>
                  <input type="hidden"  name="old_img_str" value="<?php echo $find_prd['product_imgs']; ?>">
                  <?php
                  if(!empty($_GET['product_eid']))
                  {
                        $max1=array(); 
                       	$max1=explode(',',$find_prd['product_imgs']);
                       	foreach($max1 as $key => $value)
                       	 {
                       
                       	?>
                        <span id="del<?php echo $key;?>">
                       	<img src="productimg/<?php echo $value;?>" height="100px" width="100px">&nbsp;&nbsp;&nbsp;&nbsp;
                         <input type="hidden" name="old_img_arr[]" value="<?php echo $value; ?>">
                          <button class="btn btn-danger delete" data-id="<?php echo $key; ?>"><i class="fa fa-trash" ></i></button>&nbsp;&nbsp;&nbsp;&nbsp;
                        </span>
                 	<?php
                 	}
                 }
                 	?>
                </div> 
              
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" id="submit" name="submit">Submit</button>
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
                  
                  <th>Product Name</th>

                  <th>Price</th> 
                  <th>Product Desc</th>
                  <th>Banner image</th>
                  <th>Product Image</th>
                  <th>Action</th>
                </tr>
                </thead>
               <tbody>
                <?php 
                while($fet=mysqli_fetch_assoc($res))
                {
                ?>


                <tr>
                  <td><?php echo $fet['product_name']; ?> </td>
                  <td><?php echo $fet['product_price']; ?> </td>
                  <td><?php echo $fet['product_desc']; ?> </td>
                  <td><img src="productimg/<?php echo $fet['banner_img'];?>" height="50px" width="50px"> </td>
                 <td>
                 	<?php

                 	$max=explode(',',$fet['product_imgs']);
                 	foreach($max as $key => $value)
                 	 {
                 
                 	?>
                 	<img src="productimg/<?php echo $value;?>" height="50px" width="50px">

                 	<?php
                 	}
                 	?>
                 </td> 

                            
                  <td><a class="btn btn-info" href="product.php?product_eid=<?php echo $fet['product_id']; ?>" ><i class="fa fa-edit"></i></a> &nbsp;&nbsp;&nbsp;&nbsp; <a class="btn btn-danger" href="product.php?product_did=<?php echo $fet['product_id']; ?>" ><i class="fa fa-trash"></i></a></td>
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

$("#sub_id").change(function(){

  var myid = $(this).val();
 
  $.ajax({
    type:'post',
    url:'ajax_product.php',
    data:{id:myid},
    success:function(response)
    { 
       $("#child_id").html(response);
    }
   
  });

});
// . for class # for id //syntax for ajax

$(".delete").click(function(){
    
    var id = $(this).attr("data-id");
    $("#del"+id).remove();
});
</script>


</script>