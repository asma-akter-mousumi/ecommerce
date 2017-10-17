<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
﻿<?php include '../classes/category.php';?>
<?php 
$cat= new category();
if(!isset($_GET['cat_id'])||$_GET['cat_id']==null){
    echo "<script>window.location=catlist.php</script>";
}
 else {
 $id=$_GET['cat_id'];   
}
if ($_SERVER['REQUEST_METHOD']=='POST'){
  
    $cat_name =$_POST['cat_name'];
   
    $update_cat=$cat->update_cat($cat_name,$id);
    //var_dump($update_cat);
       
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Category</h2>
               <div class="block copyblock"> 
                   <?php  if (isset($update_cat)){
                       echo $update_cat;
                   }
                   ?>
                   <?php
                   $get_cat=$cat->get_by_id($id);
                   if (isset($get_cat)){
                       while ($result=$get_cat->fetch_assoc()){?>
                           
                   
                   <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['cat_name']?>" class="medium" name="cat_name"/>
                            </td>
                        </tr>
			   <?php }
                   }
                   ?>			<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Save" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>