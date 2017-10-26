<?php include_once 'inc/header.php'; ?>
<div class="wrap">
    <?php include_once 'inc/menu.php'; ?>

    <?php
    $login = Session::get('cus_login');
    if ($login == FALSE) {
        header("Location:login.php");
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
                                        } else {
                                            echo "Shifted";
                                        }
     
                                        ?></td>
                                    
                                         <td>
                                              <?php
                                        if ($result['status'] == 0) {?>
                                        
                                             <a href="cart.php?delpro=<?php echo isset($result['id']) ? $result['id'] : "" ?>" onclick="return confirm('Are You Sure to delete')">X</a>
                                            <?php   }
 else {echo "N/A";}?>
                                             
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
