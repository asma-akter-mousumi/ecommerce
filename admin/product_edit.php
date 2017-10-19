<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
﻿<?php include '../classes/category.php'; ?>
﻿<?php include '../classes/brand.php'; ?>
﻿<?php include '../classes/product.php'; ?>
<?php
$product = new product();
if (!isset($_GET['product_id']) || $_GET['product_id'] == null) {
    echo "<script>window.location=productlist.php</script>";
} else {
    $product_id = $_GET['product_id'];
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST) == 'submit') {
    $update_product = $product->update_product($_POST, $_FILES,$product_id);
}
?>
<?php
$category = new category();
$brand = new brand();

$category_all = $category->get_all_cat();
$brand_all = $brand->get_all_brand();
?>
<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Product</h2>
        <div class="block">    
            <?php
            if (isset($update_product)) {
                echo $update_product;
            }
            ?> 
            <form action="" method="post" enctype="multipart/form-data">
                <table class="form">
                    <?php
                    $get_product = $product->get_by_id($product_id);
                    if (isset($get_product)) {
                        while ($product_result = $get_product->fetch_assoc()) {
                            ?>
                            <tr>
                                <td>
                                    <label>Name</label>
                                </td>
                                <td>
                                    <input type="text" value="<?php echo $product_result['product_name'] ?>" class="medium" name="product_name"/>
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
                                                if ($result['cat_id'] == $product_result['cat_id']) {
                                                    $cat_select = "selected";
                                                } else {
                                                    $cat_select = "";
                                                }
                                                ?>

                                                <option value="<?php echo $result['cat_id'] ?>" <?php echo isset($cat_select) ? $cat_select : '' ?>><?php echo $result['cat_name'] ?></option>
                                                <?php
                                            }
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
                                        i
                                        <?php
                                        if ($brand_all) {
                                            while ($result = $brand_all->fetch_assoc()) {
                                                if ($result['brand_id'] == $product_result['brand_id']) {
                                                    $brand_select = "selected";
                                                } else {
                                                    $brand_select = "";
                                                }
                                                ?>

                                                <option value="<?php echo $result['brand_id'] ?>" <?php echo isset($brand_select) ? $brand_select : '' ?>><?php echo $result['brand_name'] ?></option>
                                                <?php
                                            }
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
                                    <textarea class="tinymce" name="product_des" value="<?php echo $product_result['product_des'] ?>">
                                        <?php echo $product_result['product_des'] ?> 
                                    </textarea>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Price</label>
                                </td>
                                <td>
                                    <input type="text" placeholder="Enter Price..." class="medium" name="product_price" value="<?php echo $product_result['product_price'] ?>"/>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Upload Image</label>
                                </td>
                                <td><img src="<?php echo $product_result['product_image']; ?>" height="70px" width="100px"/></br>
                                    <input type="file" name="product_image"/>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <label>Product Type</label>
                                </td>
                                <td>
                                    <select id="select" name="product_type">
                                        <?php
                                        if ($product_result['product_type'] == '0') {
                                            $selected = "selected";
                                        } else {
                                            $selected1 = "selected";
                                        }
                                        ?>
                                        <option>Select Type</option>
                                        <option value="0" <?php echo isset($selected) ? $selected : '' ?>>Featured</option>  
                                        <option value="1" <?php echo isset($selected1) ? $selected1 : '' ?>>Non-Featured</option>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <td></td>
                                <td>
                                    <input type="submit" name="submit" Value="Update" />
                                </td>
                            </tr>
                        <?php }
                    }
                    ?>
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


