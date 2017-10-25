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
                <?php 

                $cusdat = $customer->customerDta($id);
                //var_dump($cusdat->fetch_assoc());
                if ($cusdat) {
                    while ($result=$cusdat->fetch_assoc()) {
                        
                        ?>
                <form action="" method="post">

                        <table class="tblone" style="width: 550px;margin:0 auto;border: 1px solid black">
                             <?php if (isset($update_customer)){?>
                              <tr>

                                <td colspan="3"><?php echo $update_customer ?></td>
                               
                                
                            </tr>
                            <?php }?>
                            <tr>

                                <td colspan="3">User Profile Update</td>
                               
                                
                            </tr>
                           
                            <tr>

                                <td>Name</td>
                               <td><input type="text" name="name" value="<?php echo isset($result['name']) ? $result['name'] : "dd" ?>"></td>                                    
                            </tr>
                            <tr>

                                <td>Email</td>
                          <td><input type="text" name="email" value="<?php echo isset($result['email']) ? $result['email'] : "dd" ?>"></td>             
                            </tr>
                            <tr>

                                <td>Address</td>
                               <td><input type="text" name="address" value="<?php echo isset($result['address']) ? $result['address'] : "dd" ?>"></td>
                               
                            </tr>
                            <tr>

                                <td>City</td>
                             <td><input type="text" name="city" value="<?php echo isset($result['city']) ? $result['city'] : "dd" ?>"></td>

                             
                            </tr>
                            <tr>

                                <td>Phone Number</td>
                             <td><input type="text" name="phone" value="<?php echo isset($result['phone']) ? $result['phone'] : "dd" ?>"></td>

                             
                            </tr>
                             <tr>

                                <td>Country</td>
                              
                                <td><input type="text" name="country" value="<?php echo isset($result['country']) ? $result['country'] : "dd" ?>"></td>
                            </tr>
                             <tr>

                                <td>Zip </td>
                              
                                <td> <input type="text" name="zip" value="<?php echo isset($result['zip']) ? $result['zip'] : "dd" ?>"></td>
                            </tr>
                   
<tr>

                                <td></td>
                                
                                <td><input type="submit" name="submit" value="Submit"></td>
                            </tr>
                </table>
                     <?php
                        }
                    }
                    ?>
                    </form>
            </div>
        </div>


<?php include_once 'inc/footer.php'; ?>


