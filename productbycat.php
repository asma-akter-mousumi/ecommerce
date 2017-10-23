<?php include_once 'inc/header.php'; ?>
<div class="wrap">
    <?php include_once 'inc/menu.php'; ?>
    <?php
    if (!isset($_GET['cat_id']) || $_GET['cat_id'] == null) {
        echo "<script>window.location=catlist.php</script>";
    } else {
        $id = $_GET['cat_id'];
    }
    $product_by_cat = $product->get_pro_cat($id);
    ?>
    <div class="main">
        <div class="content">
            <div class="content_top">
                <div class="heading">
                    <?php $cat = $category->get_by_id($id); ?>
                    <?php if ($cat) {
                        while ($result = $cat->fetch_assoc()) {
                            ?>


                            <h3><?php echo isset($result['cat_name']) ? $result['cat_name'] : "" ?></h3>
    <?php }
} ?>
                </div>
                <div class="clear"></div>
            </div>
            <div class="section group">

                <?php
                if ($product_by_cat) {
                    while ($result = $product_by_cat->fetch_assoc()) {
                        ?>
                        <div class="grid_1_of_4 images_1_of_4">
                            <a href="details.php?product_id=<?php echo $result['product_id'] ?>"><img src="admin/<?php echo isset($result['product_image']) ? $result['product_image'] : "" ?>" alt="" /></a>

                            <h2><?php echo $result['product_name'] ?> </h2>
                            <p><?php echo $fm->textShorten($result['product_des'], 50) ?></p>
                            <p><span class="price"><?php echo $result['product_price'] ?></span></p>
                            <div class="button"><span>  <a href="details.php?product_id=<?php echo $result['product_id'] ?>">Details</a></span></div>
                        </div>
    <?php }
} 
 else {
    header("Location:404.php");
}
?>

            </div>



        </div>
    </div>
</div>
<?php include_once 'inc/footer.php'; ?>