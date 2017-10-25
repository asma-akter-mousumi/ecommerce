<?php include_once 'inc/header.php'; ?>
<style>
    .division{
        width: 50%;
    }
    .tblone{
        width: 500px;margin: 0 auto;border: solid 1px gray;

    }
    .tblone tr td{
        text-align: justify;
    }
    .tbltwo{
        float: right;
        text-align: left;
        width: 50%;
        border: solid 1px gray;
        margin-right: 125px;
        margin-top: 12px;
    }
    .tbltwo tr td{
        text-align: justify;
        padding: 5px 10px;
    }
    .ordernow{
        margin-top:20px;
    }
    .ordernow a{
        display: block;
        margin: auto;
        width: 200px;
        text-align: center;
        padding: 5px;
        font-size: 25px;
        background: red;
        color: white;
    }
</style>
<div class="wrap">
    <?php include_once 'inc/menu.php';
    $id = Session::get('customer');
    ?>
    <?php
    if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
        $orderid = $id;
        $insert_order = $cart->orderdata($id);
      $del=$cart->del_cus_cart();
      header("Location:success.php");
       
    }
    ?>

    <?php
    //echo $id;     
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

        $update_customer = $customer->user_update($_POST, $id);
    }
    $login = Session::get('cus_login');
    if ($login == FALSE) {
        header("Location:login.php");
    }
    ?>
    <div class="main">
        <div class="content">
            <div class="section group">
                <div class="division" style="float:left">  <table class="tblone">
                        <tr>
                            <th >Product Name</th>
                            <th > Price</th>
                            <th >Quantity</th>

                            <th >Total Price</th>

                        </tr>
                        <?php
                        $get_product = $cart->get_cart_product();
                        if ($get_product) {
                            $sum = 0;
                            $qty = 0;
                            while ($result = $get_product->fetch_assoc()) {
                                ?>

                                <tr>
                                    <td><?php echo isset($result['product_name']) ? $result['product_name'] : "" ?></td>

                                    <td><?php echo isset($result['product_price']) ? $result['product_price'] : "" ?></td>
                                    <td><?php echo isset($result['product_qunatity']) ? $result['product_qunatity'] : "" ?></td>

                                    <td><?php
                                        $total = $result['product_price'] * $result['product_qunatity'];
                                        echo $total;
                                        ?></td>
                                </tr>
                                <?php
                                $sum = $sum + $total;
                                $qty = $qty + $result['product_qunatity'];
                                ?>
                                <?php
                            }
                        } 
                        ?>
                    </table>
                    <table class="tbltwo">
                        <tr>
                            <th>Sub Total : </th>
                            <td><?php echo isset($sum) ? $sum : "" ?></td>
                        </tr>
                        <tr>
                            <th>VAT : </th>
                            <td>10%</td>
                        </tr>
                        <tr>
                            <th>Total Quantity : </th>
                            <td><?php echo isset($qty) ? $qty : "" ?></td>
                        </tr>
                        <tr>
                            <th>Grand Total :</th>
                            <td>
                                <?php
                                $vat = $sum * 0.1;
                                $grand_total = $sum + $vat;
                                echo $grand_total;
                                Session::set("sum_pirce", $grand_total);
                                ?> </td>
                        </tr>
                    </table>    

                </div>

                <div class="division" style="float:right"> <?php
                    $cusdat = $customer->customerDta($id);
                    //var_dump($cusdat->fetch_assoc());
                    if ($cusdat) {
                        while ($result = $cusdat->fetch_assoc()) {
                            ?>

                            <table class="tblone" style="width: 550px;margin:0 auto;border: 1px solid black">
                                <tr>

                                    <td colspan="3">User Profile</td>


                                </tr>
                                <tr>

                                    <td>Name</td>
                                    <td>:</td>
                                    <td><?php echo isset($result['name']) ? $result['name'] : "dd" ?></td>
                                </tr>
                                <tr>

                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?php echo isset($result['email']) ? $result['email'] : "dd" ?></td>
                                </tr>
                                <tr>

                                    <td>Address</td>
                                    <td>:</td>
                                    <td><?php echo isset($result['phone']) ? $result['phone'] : "dd" ?></td>
                                </tr>
                                <tr>

                                    <td>Phone Number</td>
                                    <td>:</td>
                                    <td><?php echo isset($result['city']) ? $result['city'] : "dd" ?></td>
                                </tr>
                                <tr>

                                    <td>Phone Number</td>
                                    <td>:</td>
                                    <td><?php echo isset($result['country']) ? $result['country'] : "dd" ?></td>
                                </tr>
                                <tr>

                                    <td>Phone Number</td>
                                    <td>:</td>
                                    <td><?php echo isset($result['zip']) ? $result['zip'] : "dd" ?></td>
                                </tr>

                                <tr>

                                    <td></td>
                                    <td>:</td>
                                    <td><a href="user_update.php">update Details</a></td>
                                </tr>
                            </table>
                            <?php
                        }
                    }
                    ?> </div>

            </div>
            <div class="ordernow"><a href="?orderid=order">Order </a></div>
        </div>


<?php include_once 'inc/footer.php'; ?>


