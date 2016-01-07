<?php
if(!isset($_SESSION["userid"])) {
      header("Refresh:0; url=../views/homepage.php?message=You are not logged in");
    } elseif(!isset($_GET["id"]) || !isset($_POST["comment"])) {
    	header("Refresh:0; url=../views/homepage.php");
    }
include("../config/db.php");
$post_id = $_GET["id"];
if(isset($_POST["comment"])) {
	$content = $_POST["comment"];
	$userid = $_SESSION["userid"];
	$author = $_SESSION["username"];
	$message = '';
	$stmt = mysqli_prepare($conn, "INSERT INTO comments (userid, content, postid, author) VALUES (?, ?, ?, ?)");
	if($stmt) { 
		mysqli_stmt_bind_param($stmt, "isis", $userid, $content, $post_id, $author);
		mysqli_stmt_execute($stmt);
		$message="Comment posted successfully";
	} else {
		$message="An error occurred";
	}
	mysqli_stmt_close($stmt);
}
mysqli_close($conn);
header("Refresh: 0; url=../views/individual.php?message=".$message."&post_id=".$post_id."");
?>