<?php include_once 'inc/header.php'; ?>
<div class="wrap">
    <?php include_once 'inc/menu.php'; ?>

  
    <div class="main">
        <div class="content">
            <div class="cartoption">		
                <div class="cartpage">
                 
                    <h2>Compare</h2>
                    <table class="tblone">
                        <tr>
                            <th width="20%">Product Name</th>
                            <th width="10%">Image</th>
                            <th width="15%">Price</th>
                            <th width="25%">Quantity</th>
                            <th width="20%">Total Price</th>
                            <th width="10%">Action</th>
                        </tr>
                        <?php
                        $get_product = $cart->get_cart_product();
                        if ($get_product) {
                            $sum = 0;
                            while ($result = $get_product->fetch_assoc()) {
                                ?>

                                <tr>
                                    <td><?php echo isset($result['product_name']) ? $result['product_name'] : "" ?></td>
                                    <td><img src="admin/<?php echo isset($result['product_image']) ? $result['product_image'] : "" ?>" alt="" /></td>
                                    <td><?php echo isset($result['product_price']) ? $result['product_price'] : "" ?></td>
                                    <td>
                                        <form action="" method="POST">
                                            <input type="hidden" name="cart_id" value="<?php echo isset($result['cart_id']) ? $result['cart_id'] : "" ?>"/>

                                            <input type="number" name="quantity" value="<?php echo isset($result['product_qunatity']) ? $result['product_qunatity'] : "" ?>"/>
                                            <input type="submit" name="submit" value="Update"/>
                                        </form>
                                    </td>
                                    <td><?php
                                        $total = $result['product_price'] * $result['product_qunatity'];
                                        echo $total;
                                        ?></td>
                                    <td><a href="cart.php?delpro=<?php echo isset($result['cart_id']) ? $result['cart_id'] : "" ?>" onclick="return confirm('Are You Sure to delete')">X</a></td>
                                </tr>
                                <?php $sum = $sum + $total; 

                                
                                ?>
                            <?php
                            }
                        }
 else {
                            header("Location:index.php");
 }
                        ?>
                    </table>
                    <table style="float:right;text-align:left;" width="40%">
                        <tr>
                            <th>Sub Total : </th>
                            <td><?php echo isset($sum) ? $sum : "" ?></td>
                        </tr>
                        <tr>
                            <th>VAT : </th>
                            <td>10%</td>
                        </tr>
                        <tr>
                            <th>Grand Total :</th>
                            <td>
                                <?php
                                $vat = $sum * 0.1;
                                $grand_total = $sum + $vat;
                                echo $grand_total;
                                 Session::set("sum", $grand_total);
                                ?> </td>
                        </tr>
                    </table>
                </div>
                <div class="shopping">
                    <div class="shopleft">
                        <a href="index.php"> <img src="images/shop.png" alt="" /></a>
                    </div>
                    <div class="shopright">
                        <a href="payment.php"> <img src="images/check.png" alt="" /></a>
                    </div>
                </div>
            </div>  	
            <div class="clear"></div>
        </div>
    </div>
</div>
<div class="footer">
    <div class="wrapper">	
        <div class="section group">
            <div class="col_1_of_4 span_1_of_4">
                <h4>Information</h4>
                <ul>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Customer Service</a></li>
                    <li><a href="#"><span>Advanced Search</span></a></li>
                    <li><a href="#">Orders and Returns</a></li>
                    <li><a href="#"><span>Contact Us</span></a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>Why buy from us</h4>
                <ul>
                    <li><a href="about.html">About Us</a></li>
                    <li><a href="faq.html">Customer Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="contact.html"><span>Site Map</span></a></li>
                    <li><a href="preview-2.html"><span>Search Terms</span></a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>My account</h4>
                <ul>
                    <li><a href="contact.html">Sign In</a></li>
                    <li><a href="index.html">View Cart</a></li>
                    <li><a href="#">My Wishlist</a></li>
                    <li><a href="#">Track My Order</a></li>
                    <li><a href="faq.html">Help</a></li>
                </ul>
            </div>
            <div class="col_1_of_4 span_1_of_4">
                <h4>Contact</h4>
                <ul>
                    <li><span>+91-123-456789</span></li>
                    <li><span>+00-123-000000</span></li>
                </ul>
                <div class="social-icons">
                    <h4>Follow Us</h4>
                    <ul>
                        <li class="facebook"><a href="#" target="_blank"> </a></li>
                        <li class="twitter"><a href="#" target="_blank"> </a></li>
                        <li class="googleplus"><a href="#" target="_blank"> </a></li>
                        <li class="contact"><a href="#" target="_blank"> </a></li>
                        <div class="clear"></div>
                    </ul>
                </div>
            </div>
        </div>
        <div class="copy_right">
            <p>Compant Name © All rights Reseverd </p>
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

