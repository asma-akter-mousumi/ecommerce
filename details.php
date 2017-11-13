<?php include_once 'inc/header.php'; ?>
<div class="wrap">
    <?php include_once 'inc/menu.php'; ?>
    <?php
    if (isset($_GET['product_id'])) {

        $id = $_GET['product_id'];
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['quantity'])) {

        $quantity = $_POST['quantity'];

        $addToCart = $cart->add_to_cart($quantity, $id);
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['compare'])) {

        $productid = $_POST['productid'];
        
        $customeid = Session::get('customer');
       
        $insert_compare = $product->inserdata($customeid,$productid);
        
    }
    
     if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['wlist'])) {


        
        $customeid = Session::get('customer');
       
        $save = $product->savewishlist($id,$customeid);
        
    }
    ?>
    <style>
        .error{
            color: red;
        }
        .my_button{
            width: 100px;
            float: left;
            margin-right: 50px;
        }
    </style>
    <div class="main">
        <div class="content">
            <div class="section group">
                <div class="cont-desc span_1_of_2">	
                    <?php
                    $get_product = $product->get_product_by_id($id);

                    if ($get_product) {
                        while ($result = $get_product->fetch_assoc()) {
                            ?>
                            <div class="grid images_3_of_2">
                                <img src="admin/<?php echo isset($result['product_image']) ? $result['product_image'] : "" ?>" alt="" />
                            </div>
                  
                            <div class="desc span_3_of_2">
                                <h2><?php echo $result['product_name'] ?> </h2>
                                <div class="price">
                                    <p>Price: <span><?php echo $result['product_price'] ?></span></p>
                                    <p>Category: <span><?php echo $result['cat_name'] ?></span></p>
                                    <p>Brand:<span><?php echo $result['brand_name'] ?></span></p>
                                </div>
                                  <?php if(isset($insert_compare)){
                        echo $insert_compare;
                    } ?>
                                <?php if(isset($save)){
                        echo $save;
                    } ?>
                                <div class="add-cart">
                                    <form action="" method="post">
                                        <input type="number" class="buyfield" name="quantity" value="1"/>
                                        <input type="submit" class="buysubmit" name="submit" value="Buy Now"/>
                                    </form>	
                                    </br> <span style="color: red;font-size: 20px;"><?php echo isset($addToCart) ? $addToCart : ""; ?></span>
                                </div>
                                <?php  $login=Session::get("customer");
       if($login){?>
                                <div class="add-cart">
                                      <div class="my_button">
                                    <form action="" method="post">
                                        <input type="hidden" class="buysubmit" name="productid" value="<?php echo $result['product_id'] ?>"/>
                                        <input type="submit" class="buysubmit" name="compare" value="Add to compare"/>
                                    </form>
                                      </div>
                                    <div class="my_button">
                                    <form action="" method="post">
                                       
                                        <input type="submit" class="buysubmit" name="wlist" value="Wish List"/>
                                    </form>
                                    </div>
                                    </br> <span style="color: red;font-size: 20px;"><?php echo isset($addToCart) ? $addToCart : ""; ?></span>
                                </div>
       <?php }?>
                            </div>
                            <div class="product-desc">
                                <h2>Product Details</h2>
                                <?php echo $result['product_des'] ?>
                            </div>

                        </div>
                    <?php }
                }
                ?>

                <div class="rightsidebar span_3_of_1">
                    <h2>CATEGORIES</h2>
                    <ul>
                        <?php
                        $getcat = $category->get_all_cat();
                        if ($getcat) {
                            while ($result = $getcat->fetch_assoc()) {
                                ?> 



                                <li><a href="productbycat.php?cat_id=<?php echo $result['cat_id'] ?>"><?php echo isset($result['cat_name']) ? $result['cat_name'] : "" ?></a></li>
                            <?php }
                        }
                        ?>

                    </ul>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            /*
             var defaults = {
             containerID: 'toTop', // fading element id
             containerHoverID: 'toTopHover', // fading element hover id
             scrollSpeed: 1200,
             easingType: 'linear' 
             };
             */

            $().UItoTop({easingType: 'easeOutQuart'});

        });
    </script>
    <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
</body>
</html>

