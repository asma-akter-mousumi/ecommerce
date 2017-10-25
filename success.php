<?php include_once 'inc/header.php'; ?>
<style>
    .success{
        width:500px;
        min-height: 200px;
        text-align: center;
        border: solid 1px gray;
        margin: auto;
        padding: 50px
    }
    .success h2{
        border-bottom: solid 1px #ddd;
        margin-bottom: 40px;
        padding-bottom: 10px;
    }

    .success p{
        line-height: 25px;
        font-size: 18px;
        text-align: left;
    }
</style>
<div class="wrap">
    <?php include_once 'inc/menu.php'; ?>
    <?php
     $id = Session::get('customer');
      $sum = Session::get('sum_pirce');
  
   
    $login = Session::get('cus_login');
    if ($login == FALSE) {
        header("Location:login.php");
    }
    ?>
    <div class="main">
        <div class="content">
            <div class="section group">
                <div class="success">
                    <h2>Success</h2>
     <p>Total Amount(Including Vat) :<?php echo $sum11;?></p>
                    <p>Thanks for purchase we will contact with you soon Here Your Order details<a href="orderdetails.php">Visit here</a></p>
                </div>
              
            </div>
        </div>


<?php include_once 'inc/footer.php'; ?>


