<?php include_once 'inc/header.php';?>
  <div class="wrap">
	<?php include_once 'inc/menu.php'; ?>
      <?php echo session_id();?>
	<?php include_once 'inc/slider.php'; ?>
 <div class="main">
    <div class="content">
    	<div class="content_top">
    		<div class="heading">
    		<h3>Feature Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
        
	      <div class="section group">
                  <?php $getfeature_poduct=$product->get_feature_product();
                if($getfeature_poduct){
                    while ($result=$getfeature_poduct->fetch_assoc()){   
                
                ?>
				<div class="grid_1_of_4 images_1_of_4">
                                    <a href="details.php?product_id=<?php echo $result['product_id'] ?>"><img src="admin/<?php echo isset($result['product_image'])?$result['product_image']:""?>" alt="" /></a>
					 <h2><?php echo $result['product_name'] ?> </h2>
					 <p><?php echo $fm->textShorten($result['product_des'],10) ?></p>
					 <p><span class="price"><?php echo $result['product_price'] ?></span></p>
				     <div class="button"><span><a href="details.php?product_id=<?php echo $result['product_id'] ?>">Details</a></span></div>
				</div>
			  <?php }}?>
			</div>
              
			<div class="content_bottom">
    		<div class="heading">
    		<h3>New Products</h3>
    		</div>
    		<div class="clear"></div>
    	</div>
			<div class="section group">
                             <?php $getnew_poduct=$product->get_new_product();
                if($getnew_poduct){
                    while ($result=$getnew_poduct->fetch_assoc()){   
                
                ?>
				<div class="grid_1_of_4 images_1_of_4">
					  <a href="details.php?product_id=<?php echo $result['product_id'] ?>"><img src="admin/<?php echo isset($result['product_image'])?$result['product_image']:""?>" alt="" /></a>
				
					<h2><?php echo $result['product_name'] ?> </h2>
					 <p><span class="price"><?php echo $result['product_price'] ?></span></p>
				       <div class="button"><span><a href="details.php?product_id=<?php echo $result['product_id'] ?>">Details</a></span></div>
			
				</div>
				  <?php }}?>
				
				
			</div>
    </div>
 </div>
</div>
  <?php include_once 'inc/footer.php';?>