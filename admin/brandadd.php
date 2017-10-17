<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
﻿<?php include '../classes/brand.php';?>
<?php 
$brand= new brand();
if ($_SERVER['REQUEST_METHOD']=='POST'){
  
    $brand_name =$_POST['brand_name'];
   
    $insert_brand=$brand->add_brand($brand_name);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Brand</h2>
               <div class="block copyblock"> 
                   <?php  if (isset($insert_brand)){
                       echo $insert_brand;
                   }
                   ?>
                   <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Brand Name..." class="medium" name="brand_name"/>
                            </td>
                        </tr>
						<tr> 
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