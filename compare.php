<?php include_once 'inc/header.php'; ?>
<div class="wrap">
    <?php include_once 'inc/menu.php'; ?>
    <style>
        table.tblone img{
            height: 100px;
            width: 100px;
        }
    </style>
  
    <div class="main">
        <div class="content">
            <div class="cartoption">		
                <div class="cartpage">
                 
                    <h2>Compare</h2>
                    <table class="tblone">
                        <tr>
                            <th>Product Name</th>
                            <th>Image</th>
                            <th>Price</th>
                       
                            <th >Action</th>
                        </tr>
                        <?php
                          $cus=Session::get("customer");
                        $get_product = $cart->get_comp_product($cus);
                        if ($get_product) {
                           
                            while ($result = $get_product->fetch_assoc()) {
                                ?>
                        <tr>
                             <td><?php echo isset($result['product_name']) ? $result['product_name'] : "" ?></td>
                             <td><img src="admin/<?php echo isset($result['image']) ? $result['image'] : "" ?>" height="300px" width="300px" /></td>
                                    <td><?php echo isset($result['price']) ? $result['price'] : "" ?></td>
                                    <td> <a href="details.php?product_id=<?php echo $result['product_id']?>">Veiw</a></td>
                                    
                                             </tr>
                                
                         <?php   }
                        }?>

                    </table>
                  
                </div>
                <div class="shopping">
                    <div class="shopleft">
                        <a href="index.php"> <img src="images/shop.png" alt="" /></a>
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

