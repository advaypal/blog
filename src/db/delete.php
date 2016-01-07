<?php
	include("../config/db.php");
	$id = $_GET["id"];
	$stmt = mysqli_prepare($conn, "DELETE FROM posts WHERE id= ?" );
	mysqli_stmt_bind_param($stmt, "i", $id);
	mysqli_stmt_execute($stmt);
	mysqli_stmt_close($stmt);
	header("Refresh:0; url=../views/homepage.php?message=Article sucessfully deleted");
?>