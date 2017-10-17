<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
﻿<?php include '../classes/category.php';?>
<?php 
$cat= new category();
if (isset($_GET['delcat'])){
    $id=$_GET['delcat'];
    $del=$cat->delete_cat($id);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Category List</h2>
                <div class="block">  
                    <?php if (isset($del)){
                        echo $del;
                    }?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Category Name</th>
							<th>Action</th>
						</tr>
					</thead>
                                        
					<tbody>
                                            <?php $all_cat=$cat->get_all_cat();
 if ($all_cat){
     $i=0;
     while ($result=$all_cat->fetch_assoc()){
     $i++;    
  ?>                                         
                                          
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo $result['cat_name'];?></td>
							<td><a href="cat_edit.php?cat_id=<?php echo $result['cat_id'] ?>">Edit</a> || 
                                                            <a href="?delcat=<?php echo $result['cat_id'] ?>" onclick="return confirm('Are You Sure to delete')">Delete</a></td>
						</tr>
						<?php    }
 }
    ?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
	$(document).ready(function () {
	    setupLeftMenu();

	    $('.datatable').dataTable();
	    setSidebarHeight();
	});
</script>
<?php include 'inc/footer.php';?>

