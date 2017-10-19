<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include_once '../helper/format.php'; ?>
﻿<?php include '../classes/product.php'; ?>
<?php
$fm = new Format();
$product = new product();
if (isset($_GET['delproduct'])){
    $id=$_GET['delproduct'];
    $del=$product->delete_product($id);
}
?>
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Post List</h2>
        <div class="block">  

  <?php if (isset($del)){
                        echo $del;
                    }?>
            <table class="data display datatable" id="">
                <thead>
                    <tr>
                        <th>SI</th>
                        <th>Product Name</th>
                        <th>Category</th>
                        <th>Brand</th>
                        
                        <th>Product price</th>
                         <th>Product Type</th>
                          <th>Product image</th>
                       
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $get_allproduct = $product->getall();
                    $i = 0;
                   
                    if (isset($get_allproduct)) {

                        while ($result = $get_allproduct->fetch_assoc()) {
                            $i++;
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['product_name']; ?></td>
                                <td><?php echo $result['cat_name']; ?></td>
                                <td><?php echo $result['brand_name']; ?></td>
                                
                                 <td><?php echo $result['product_price']; ?></td>
                                <td>
                                     <?php
                                           
                                    if ($result['product_type'] = 0)
                                        echo "General";
                                    else {
                                        echo "Featured";
                                    }
                                    ?>
                                   </td>
                                <td>
                                    <img src="<?php echo isset($result['product_image'])?$result['product_image']:'not given'; ?>" height="40px" width="60px"/>
                                </td>
                                
                               

                                <td><a href="product_edit.php?product_id=<?php echo $result['product_id'] ?>">Edit</a> || 
                                                            <a href="?delproduct=<?php echo $result['product_id'] ?>" onclick="return confirm('Are You Sure to delete')">Delete</a></td>
					
                            </tr>
                            <?php
                        }
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
<?php include 'inc/footer.php'; ?>
