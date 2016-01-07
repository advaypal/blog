<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		require_once("common/header.php");
		if(!isset($_SESSION["userid"])) {
      		header("Refresh:0; url=../views/homepage.php?message=You are not logged in");
    	}
		$filter = function($id, $userid, $author, $title) { return $userid==$_SESSION["userid"]; };
		require_once("../db/retrieve_posts.php");
	?>
</body>
</html>