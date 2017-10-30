<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
﻿<?php 
$filepath=  realpath(dirname(__FILE__));
include $filepath.'/../classes/customer.php';?>


<?php 
$cus= new customer();
if(!isset($_GET['cusid'])||$_GET['cusid']==null){
    echo "<script>window.location=index.php</script>";
}
 else {
 $id=$_GET['cusid'];   
}
if ($_SERVER['REQUEST_METHOD']=='POST'){
  echo "<script>window.location=index.php</script>";
  
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Customer Details</h2>
               <div class="block copyblock"> 
                   <?php  if (isset($update_cat)){
                       echo $update_cat;
                   }
                   ?>
                   <?php
                   $get_customer=$cus->customerDta($id);
                   if (isset($get_customer)){
                       while ($result=$get_customer->fetch_assoc()){?>
                           
                   
                   <form action="" method="post">
                    <table class="form">					
                        <tr>
                        <tr>
                            <td>Customer Name</td>
                         <td>
                                <input type="text" readonly="readonly" value="<?php echo $result['name']?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>
                                 <input type="text" readonly="readonly" value="<?php echo $result['address']?>" class="medium"/>
                            </td>
                        </tr>
                        <tr>
                            <td>City</td>
                      <td>
                                 <input type="text" readonly="readonly" value="<?php echo $result['city']?>" class="medium" />
                            </td>
                     </tr>
                      <tr>  
                         <td>Phone Number</td>
                             <td>
                                 <input type="text" readonly="readonly" value="<?php echo $result['phone']?>" class="medium"/>
                            </td>
                        </tr>
                     <tr>  
                         <td>Email</td>
                             <td>
                                 <input type="text" readonly="readonly" value="<?php echo $result['email']?>" class="medium"/>
                            </td>
                        </tr>
                         
			   <?php }
                   }
                   ?>			<tr> 
                            <td>
                                <input type="submit" name="submit" Value="OK" />
                            </td>
                        </tr>
                    </table>
                    </form>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>