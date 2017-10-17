<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
﻿<?php include '../classes/category.php'; ?>
﻿<?php include '../classes/brand.php'; ?>
﻿<?php include '../classes/product.php'; ?>
<?php 
$product= new product();
if ($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST)=='submit'){
  $insert_product=$product->add_product($_POST,$_FILES);
}
?>
<?php
$category = new category();
$brand = new brand();
$category_all = $category->get_all_cat();
$brand_all=$brand->get_all_brand();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">    
           <?php if (isset($insert_product)){
               echo $insert_product;
           }?> 
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">

                    <tr>
                        <td>
                            <label>Name</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Enter Product Name..." class="medium" name="product_name"/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Category</label>
                        </td>
                        <td>
                            <select id="cat_id" name="cat_id">
                                <?php
                                if ($category_all) {
                                    while ($result = $category_all->fetch_assoc()) {
                                        ?>
                                        
                                        <option value="<?php echo $result['cat_id'] ?>"><?php echo $result['cat_name'] ?></option>
                                    <?php }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Brand</label>
                        </td>
                        <td>
                            <select id="brand_id" name="brand_id">
                               
                                <?php
                                if ($brand_all) {
                                    while ($result = $brand_all->fetch_assoc()) {
                                        ?>
                                     
                                        <option value="<?php echo $result['brand_id'] ?>"><?php echo $result['brand_name'] ?></option>
                                    <?php }
                                }
                                ?>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td style="vertical-align: top; padding-top: 9px;">
                            <label>Description</label>
                        </td>
                        <td>
                            <textarea class="tinymce" name="product_des">
                                
                            </textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Price</label>
                        </td>
                        <td>
                            <input type="text" placeholder="Enter Price..." class="medium" name="product_price"/>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Upload Image</label>
                        </td>
                        <td>
                            <input type="file" name="product_image"/>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label>Product Type</label>
                        </td>
                        <td>
                            <select id="select" name="product_type">
                                <option>Select Type</option>
                                <option value="0">Featured</option>
                                <option value="1">Non-Featured</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" Value="Save" />
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>
</div>
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setupTinyMCE();
        setDatePicker('date-picker');
        $('input[type="checkbox"]').fancybutton();
        $('input[type="radio"]').fancybutton();
    });
</script>
<!-- Load TinyMCE -->
<?php include 'inc/footer.php'; ?>


