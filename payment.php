<?php include_once 'inc/header.php'; ?>
<style>
    .payment{
        width:500px;
        min-height: 200px;
        text-align: center;
        border: solid 1px gray;
        margin: auto;
        padding: 50px
    }
    .payment h2{
        border-bottom: solid 1px #ddd;
        margin-bottom: 40px;
        padding-bottom: 10px;
    }
    .payment a{
        background: red none repeat scroll 0 0;
        border-radius: 3px;
        color: white;
        font-size: 25px;
        padding: 20px 10px;
    }
    .back a{
        width: 160px;margin: 5px auto;padding: 10px;text-align: center;display: block;background: #555;border: solid 1px gray;color: white;font-size: 20px;
    }
</style>
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
                    <a href="offline.php">OffLine Payment</a>
                     <a href="online.php">Online Payment</a>
                </div>
                <div class="back">
                    <a href="cart.php">Previous</a>
                </div>
            </div>
        </div>


<?php include_once 'inc/footer.php'; ?>


