<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
﻿<?php include '../classes/brand.php';?>
<?php 
$brand= new brand();
if(!isset($_GET['brand_id'])||$_GET['brand_id']==null){
    echo "<script>window.location=brand_list.php</script>";
}
 else {
 $id=$_GET['brand_id'];   
}
if ($_SERVER['REQUEST_METHOD']=='POST'){
  
    $brand_name =$_POST['brand_name'];
   
    $update_brand=$brand->update_brand($brand_name,$id);
    //var_dump($update_cat);
       
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Edit Brand</h2>
               <div class="block copyblock"> 
                   <?php  if (isset($update_brand)){
                       echo $update_brand; } ?>
                         
                   
                   <form action="" method="post">
                    <table class="form">					
                       <?php
                   $get_brand=$brand->get_by_id($id);
                   if (isset($get_brand)){
                      
                       while ($result=$get_brand->fetch_assoc()){
                      
                           ?>
                    
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['brand_name']?>" class="medium" name="brand_name"/>
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