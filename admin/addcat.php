﻿<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
﻿<?php include '../classes/category.php';?>
<?php 
$cat= new category();
if ($_SERVER['REQUEST_METHOD']=='POST'){
  
    $cat_name =$_POST['cat_name'];
   
    $insert_cat=$cat->add_cat($cat_name);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Add New Category</h2>
               <div class="block copyblock"> 
                   <?php  if (isset($insert_cat)){
                       echo $insert_cat;
                   }
                   ?>
                   <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" placeholder="Enter Category Name..." class="medium" name="cat_name"/>
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