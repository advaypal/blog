<html>
	<head>
		<title> Advay's blog </title>
		<link rel="stylesheet" type="text/css" href="/../../static/css/bootstrap.css"/>
		<link rel="stylesheet" type="text/css" href="/../../static/css/style.css"/>
		<script type="text/javascript">
			function logoutconfirm() {
				return confirm("Are you sure you wish to logout?");
			}
		</script>
	</head>
	<body>
		<div class="container">
			<div class="nav" >
					<div class="pull-left">
						<ul class="nav nav-pills">
						  <li  id ="home" class="active"><a href="homepage.php" data-toggle="pill" > Home </a> </li>
						  <li  id="search"><a href="search.php" data-toggle="pill"> Search </a> </li>
						 </ul>
					</div>
					<div class="pull-right">
						<?php
						//login bar based on login status
						include("../user/login.php");
						if(!isset($_SESSION["userid"])) {
							echo '
							<form class="form-inline"; method="post"; action="homepage.php?message=Login successful">
								<input class ="form-control" type="text"; placeholder="username"; name="username"; />
								<input class ="form-control" type="password"; placeholder="password"; name="password"/>
								<button type="submit" class="btn btn-default"> Login</button>
							</form>
							';
							if(isset($message)) {
								echo $message;
							}
						} else {
							echo '
								<ul class="nav nav-pills">
						  			<li class="active"><a href="homepage.php"> Welcome '.$_SESSION["username"].' </a> </li>
						  			<li id="post"> <a href="post.php" data-toggle="pill"> Write Article </a> </li>
						  			<li id="myarticles"> <a href="article.php" data-toggle="pill"> Your Articles </a> </li>
						  			<li id="logout" > <a href="../user/logout.php" data-toggle="pill" onclick="return logoutconfirm()"> Logout </a> </li>
						 		</ul>
							';				
						}
						?>
					</div>
			</div>
		</div>
	</body>
</html>		

