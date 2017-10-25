<?php include_once 'inc/header.php'; ?>

<div class="wrap">
    <?php include_once 'inc/menu.php'; ?>
    <?php
    $id = Session::get('customer');
               
          //echo $id;     
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $update_customer = $customer->user_update($_POST,$id);
        
    }
    $login = Session::get('cus_login');
    if ($login == FALSE) {
        header("Location:login.php");
    }
    ?>
    <div class="main">
        <div class="content">
            <div class="section group">
                <div class="payment">
                    <h2>Choose A Payment Option</h2>
                   
                </div>
                <div class="back">
                    <a href="cart.php">Previous</a>
                </div>
            </div>
        </div>


<?php include_once 'inc/footer.php'; ?>


