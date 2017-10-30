<div class="header_top">
    <div class="logo">
        <a href="index.html"><img src="images/logo.png" alt="" /></a>
    </div>
    <div class="header_top_right">
        <div class="search_box">
            <form>
                <input type="text" value="Search for Products" onfocus="this.value = '';" onblur="if (this.value == '') {
                            this.value = 'Search for Products';
                        }"><input type="submit" value="SEARCH">
            </form>
        </div>
        <div class="shopping_cart">
            <div class="cart">
                <a href="#" title="View my shopping cart" rel="nofollow">
                    <span class="cart_title">Cart</span>
                    <?php
                    $getdata = $cart->get_cart_product();
                    //var_dump($getdata);
                    if ($getdata) {
                        $sum = Session::get('sum');
                        ?> 
                        <span class="no_product"><?php echo "$" . $sum; ?></span>
                        <?php
                    } else {
                        echo "0";
                    }
                    ?>

                </a>
            </div>
        </div>

        <?php
        $login = Session::get('cus_login');
        if ($login == FALSE) {
            ?>
            <div class="login">
                <a href="login.php">Login</a> </div>
        <?php }
 else {?>
       <div class="login">
           <a href="?cid=<?php Session::get('customer') ?>">Logout</a> 
       </div>
 <?php }
        ?>
<?php if (isset($_GET['cid'])){
    $delpro=$cart->del_cus_cart();
     Session::destroy();

} ?>

        <div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<div class="menu">
    <ul id="dc_mega-menu-orange" class="dc_mm-orange">
        <li><a href="index.php">Home</a></li>
        <li><a href="products.php">Products</a> </li>
        <li><a href="topbrands.php">Top Brands</a></li>
        <?php 
              $login=Session::get("customer");
      echo $login;
      $chkorder=$cart->get_order($login);
        if(isset($chkorder)&& $login){?>
        <li><a href="order.php">Order Details</a></li>
        <?php 
        }
        $ckcart=$cart->get_cart_product();
       
        if($login){
            ?>
         <li><a href="profile.php">Profile</a></li>
        <?php
        }
        
        if($ckcart){
            ?>
      <li><a href="cart.php">Cart</a></li>
       <li><a href="payment.php">Payment</a></li>
        <?php
        }
        ?>
       
        <li><a href="contact.php">Contact</a> </li>
          <li><a href="compare.php">Compare</a> </li>
        <div class="clear"></div>
    </ul>
</div>