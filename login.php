<?php include_once 'inc/header.php'; ?>
<div class="wrap">
    <?php
    $login=  Session::get('cus_login');
    if($login==true){
        header("Location:order.php");
    }

    include_once 'inc/menu.php';
   
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {

        $login_customer = $customer->login($_POST);
    }
    ?>


    <div class="main">
        <div class="content">
            <div class="login_panel">
                <h3>Existing Customers</h3>
                <p>Sign in with the form below.</p>
                <?php echo isset($login_customer) ? $login_customer : "" ?>
                <form action="" method="post">
                    <input type="text" placeholder="Enter Your Name" name="email">
                    <input type="password" name="password" placeholder="Enter your password">
                    <p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>
                    <div class="buttons"><div><button class="grey" name="login">Sign In</button></div></div>
                </form>

            </div>
            <div class="register_account">
                <h3>Register New Account</h3>
<?php 
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])) {
        $regi_customer = $customer->regitration($_POST);
    }
echo isset($regi_customer) ? $regi_customer : "" ?>
                <form action="" method="post">
                    <table>
                        <tbody>
                            <tr>
                                <td>
                                    <div>
                                        <input type="text" placeholder="Enter Your Name " name="name" >
                                    </div>

                                    <div>
                                        <input type="text" placeholder="Enter City Name " name="city" >
                                    </div>

                                    <div>
                                        <input type="text" placeholder="Enter Zip Code " name="zip_code">
                                    </div>
                                    <div>
                                        <input type="text" placeholder="Enter Email " name="email">
                                    </div>
                                </td>
                                <td>
                                    <div>
                                        <input type="text" placeholder="Enter Address " name="address">
                                    </div>
                                    <div>
                                        <input type="text" placeholder="Enter Country " name="country">
                                    </div>	        

                                    <div>
                                        <input type="text"placeholder="Enter Phone Number " name="phone">
                                    </div>

                                    <div>
                                        <input type="text" placeholder="Enter Your Password " name="password">
                                    </div>
                                </td>
                            </tr> 
                        </tbody></table> 
                    <div class="search"><div><button class="grey" name="register">Create Account</button></div></div>
                    <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
                    <div class="clear"></div>
                </form>
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

