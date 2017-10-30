<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
if (isset($_GET['shift_id'])){
    $shift_id=$_GET['shift_id'];
     $price=$_GET['price'];
      $time=$_GET['time'];
      $shifted=$cart->product_shifted($shift_id,$price,$time);
}
if (isset($_GET['del_id'])){
    $del_id=$_GET['del_id'];
     $price=$_GET['price'];
      $time=$_GET['time'];
      $dele=$cart->product_shifted_del($del_id,$price,$time);
}
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Inbox</h2>
                <div class="block">  
                    <?php if(isset($shifted))echo $shifted;?>
                    <?php if(isset($dele))echo $dele;?>
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Serial No.</th>
							<th>Date & Time</th>
							<th>Product</th>
                                                        <th>Quantity</th>
							<th>Price</th>
                                                        <th>Address</th>
							
                                                        <th>Action</th>
							
						</tr>
					</thead>
					<tbody>
                                            <?php $get_product=$cart->getAllorderProduct();
                                                    if($get_product){
                                                        while($result=$get_product->fetch_assoc()){
                                                   
                                                    ?>
						<tr class="odd gradeX">
							<td><?php echo $result['customer_id'] ?></td>
							<td><?php echo $fm->formatDate($result['order_date']) ?></td>
                                                        <td><?php echo $result['product_name'] ?></td>
							<td><?php echo $result['quantity'] ?></td>
                                                        <td><?php echo $result['product_price'] ?></td>
                                                        <td><a href="customer.php?cusid=<?php echo $result['customer_id']?>">View Details</a></td>
							<td>
                                                            <?php if($result['status']=='0'){ ?>
                                                            <a href="?shift_id=<?php echo $result['customer_id'] ?>&price=<?php echo $result['product_price'] ?>&time=<?php echo $result['order_date'] ?>">Shifted</a> 
                                                            <?php } elseif ($result['status']=='1') {
                                                                     echo "Pending";   
                                                                    } else {?>
                                                                         <a href="?del_id=<?php echo $result['customer_id'] ?>&price=<?php echo $result['product_price'] ?>&time=<?php echo $result['order_date'] ?>">Remove</a> 
                                                                
                                                                   <?php }?>
                                                                  
                                                                
                                                        </td>
						</tr>
						
						
                                                    <?php }}?>
					</tbody>
				</table>
               </div>
            </div>
        </div>
<script type="text/javascript">
    $(document).ready(function () {
        setupLeftMenu();

        $('.datatable').dataTable();
        setSidebarHeight();
    });
</script>
<?php include 'inc/footer.php';?>
