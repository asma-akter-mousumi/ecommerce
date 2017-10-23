<?php include_once 'inc/header.php';?>
  <div class="wrap">
	<?php include_once 'inc/menu.php'; ?>
      
<?php     $login=  Session::get('cus_login');
    if($login==FALSE){
        header("Location:login.php");
    }
?>
 <div class="main">
    <div class="content">
          <div class="section group">
                  <div class="order">
                      <h2>Order Page</h2>
			</div>
              
			
    		
    		<div class="clear"></div>
    	</div>
		
    </div>
 </div>
</div>
  <?php include_once 'inc/footer.php';?>
