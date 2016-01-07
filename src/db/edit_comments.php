<?php
include("../config/db.php");
$id = $_GET["id"];
if(isset($_POST["comment"])) {
	$content = $_POST["comment"];
	$message = '';
	$stmt = mysqli_prepare($conn, "UPDATE comments SET content=? WHERE id=?");
	if($stmt) { 
		mysqli_stmt_bind_param($stmt, "si", $content, $id);
		mysqli_stmt_execute($stmt);
		$message="Comment edited successfully";
	} else {
		$message="An error occurred";
	}
	mysqli_stmt_close($stmt);
}
mysqli_close($conn);

header("Refresh: 0; url=../views/individual.php?message=".$message."&post_id=".$_GET["post_id"]."");
?>