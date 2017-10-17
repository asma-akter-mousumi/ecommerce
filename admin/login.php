
<?php include_once '../classes/admin_login.php';
$al=new AdminLogin();

if ($_SERVER['REQUEST_METHOD']=='POST'){
  
    $adminuser =$_POST['adminuser'];
    $adminpass=  md5($_POST['adminpass']);
    $loginchk=$al->adminlogin($adminuser,$adminpass);
}

?>
<!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/stylelogin.css" media="screen" />
</head>
<body>
<div class="container">
	<section id="content">
            <form action="login.php" method="post">
			<h1>Admin Login</h1>
                        <span style="color:red;font-size: 18px;">
                            <?php if(isset($loginchk)){
                                echo $loginchk;
                            } ?>
                        </span>
			<div>
				<input type="text" placeholder="Username" required="" name="adminuser"/>
			</div>
			<div>
				<input type="password" placeholder="Password" required="" name="adminpass"/>
			</div>
			<div>
				<input type="submit" value="Log in" />
			</div>
		</form><!-- form -->
		<div class="button">
			<a href="#">Training with live project</a>
		</div><!-- button -->
	</section><!-- content -->
</div><!-- container -->
</body>
</html>