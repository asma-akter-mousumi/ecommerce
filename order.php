<?php include_once 'inc/header.php'; ?>
<div class="wrap">
    <?php include_once 'inc/menu.php'; ?>

    <?php
    $login = Session::get('cus_login');
    if ($login == FALSE) {
        header("Location:login.php");
    }
    if (isset($_GET['shift_id'])) {
        $shift_id = $_GET['shift_id'];
        $price = $_GET['price'];
        $time = $_GET['time'];
        $shifted = $cart->product_shifted_con($shift_id, $price, $time);
    }
    ?>
    <div class="main">
        <div class="content">
            <div class="section group">
                <div class="order">
                    <h2>Order Page</h2>
                    <table class="tblone">
                        <tr>
                            <th >Product Name</th>
                            <th >Image</th>

                            <th >Quantity</th>
                            <th >Total Price</th>
                            <th >Date</th>
                            <th >Status</th>
                            <th >Action</th>
                        </tr>
                        <?php
                        $id = Session::get('customer');
                        $get_product = $cart->get_order($id);
                        if ($get_product) {
                            $sum = 0;
                            while ($result = $get_product->fetch_assoc()) {
                                ?>

                                <tr>
                                    <td><?php echo isset($result['product_name']) ? $result['product_name'] : "" ?></td>
                                    <td><img src="admin/<?php echo isset($result['image']) ? $result['image'] : "" ?>" alt="" /></td>
                                    <td><?php echo isset($result['quantity']) ? $result['quantity'] : "" ?></td>

                                    <td><?php echo isset($result['product_price']) ? $result['product_price'] : "" ?>
                                    </td>
                                    <td><?php echo isset($result['order_date']) ? $fm->formatDate($result['order_date']) : "" ?></td>
                                    <td><?php
                                        if ($result['status'] == 0) {
                                            echo "Pending";
                                        } elseif ($result['status'] == 1) {
                                            echo "Shifted";
                                        } else {
                                            echo "OK";
                                        }
                                        ?>


                                    </td>

                                    <td>
                                        <?php if ($result['status'] == 1) { ?>
                                            <a href="?shift_id=<?php echo $result['customer_id'] ?>&price=<?php echo $result['product_price'] ?>&time=<?php echo $result['order_date'] ?>">Confirm</a> 

                                        <?php
                                        } elseif ($result['status'] == 2) {
                                            echo "OK";
                                        } elseif ($result['status'] == 0) {
                                            echo "N/A";
                                        }
                                        ?>



                                    </td>


                                </tr>

        <?php
    }
} else {
    header("Location:index.php");
}
?>
                    </table>

                </div>



                <div class="clear"></div>
            </div>

        </div>
    </div>
</div>
<?php include_once 'inc/footer.php'; ?>
