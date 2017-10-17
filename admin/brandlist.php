<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
﻿<?php include '../classes/brand.php';?>
<?php 
$brand= new brand();
if (isset($_GET['del_brand'])){
    $id=$_GET['del_brand'];
    $del=$brand->delete_brand($id);
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
							<th>Brand Name</th>
							<th>Action</th>
						</tr>
					</thead>
                                        
					<tbody>
                                            <?php $all_brand=$brand->get_all_brand();
 if ($all_brand){
     $i=0;
     while ($result=$all_brand->fetch_assoc()){
     $i++;    
  ?>                                         
                                          
						<tr class="odd gradeX">
							<td><?php echo $i ?></td>
							<td><?php echo $result['brand_name'];?></td>
							<td><a href="edit_brand.php?brand_id=<?php echo $result['brand_id'] ?>">Edit</a> || 
                                                            <a href="?del_brand=<?php echo $result['brand_id'] ?>" onclick="return confirm('Are You Sure to delete')">Delete</a></td>
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

