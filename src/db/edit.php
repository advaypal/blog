<?php
include("../config/db.php");
if(isset($_POST["title"]) && isset($_POST["content"])) {
	$title = $_POST["title"];
	$content = $_POST["content"];
	$message='';
	$stmt = mysqli_prepare($conn, "UPDATE posts SET Title=?, Content=? WHERE id=?");
	if($stmt) { 
		mysqli_stmt_bind_param($stmt, "ssi", $title, $content, $post_id);
		mysqli_stmt_execute($stmt);
		$message="Article edited successfully";
	} else {
		$message="An error occurred";
	}
	mysqli_stmt_close($stmt);
}
// the following query is to extract informaion for editing the article
$stmt1 = mysqli_prepare($conn, "SELECT Title, Content FROM posts WHERE id=?");
mysqli_stmt_bind_param($stmt1, "i", $post_id);
mysqli_stmt_execute($stmt1);
mysqli_stmt_bind_result($stmt1, $title, $content);
mysqli_stmt_fetch($stmt1);
mysqli_stmt_close($stmt1);
mysqli_close($conn);
?>