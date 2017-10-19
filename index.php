<?php include_once 'inc/header.php';?>
  <div class="wrap">
	<?php include_once 'inc/menu.php'; ?>
      <?php echo session_id();?>
	<div class="header_bottom">
		<div class="header_bottom_left">
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.html"> <img src="images/pic4.png" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Iphone</h2>
						<p>Lorem ipsum dolor sit amet sed do eiusmod.</p>
						<div class="button"><span><a href="preview.html">Add to cart</a></span></div>
				   </div>
			   </div>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.html"><img src="images/pic3.png" alt="" / ></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Samsung</h2>
						  <p>Lorem ipsum dolor sit amet, sed do eiusmod.</p>
						  <div class="button"><span><a href="preview.php">Add to cart</a></span></div>
					</div>
				</div>
			</div>
			<div class="section group">
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						 <a href="preview.php"> <img src="images/pic3.jpg" alt="" /></a>
					</div>
				    <div class="text list_2_of_1">
						<h2>Acer</h2>
						<p>Lorem ipsum dolor sit amet, sed do eiusmod.</p>
						<div class="button"><span><a href="preview.php">Add to cart</a></span></div>
				   </div>
			   </div>			
				<div class="listview_1_of_2 images_1_of_2">
					<div class="listimg listimg_2_of_1">
						  <a href="preview.php"><img src="images/pic1.png" alt="" /></a>
					</div>
					<div class="text list_2_of_1">
						  <h2>Canon</h2>
						  <p>Lorem ipsum dolor sit amet, sed do eiusmod.</p>
						  <div class="button"><span><a href="preview.php">Add to cart</a></span></div>
					</div>
				</div>
			</div>
		  <div class="clear"></div>
		</div>
			 <div class="header_bottom_right_images">
		   <!-- FlexSlider -->
             
			<section class="slider">
				  <div class="flexslider">
					<ul class="slides">
						<li><img src="images/1.jpg" alt=""/></li>
						<li><img src="images/2.jpg" alt=""/></li>
						<li><img src="images/3.jpg" alt=""/></li>
						<li><img src="images/4.jpg" alt=""/></li>
				    </ul>
				  </div>
	      </section>
<!-- FlexSlider -->
	    </div>
	  <div class="clear"></div>
  </div>	

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