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
                <?php
                $id = Session::get('customer');

                $cusdat = $customer->customerDta($id);
                //var_dump($cusdat->fetch_assoc());
                if ($cusdat) {
                    while ($result=$cusdat->fetch_assoc()) {
                        
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
                    ?>
            </div>
        </div>


<?php include_once 'inc/footer.php'; ?>


