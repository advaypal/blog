<?php
include("../config/db.php");
if(isset($_POST["title"]) && isset($_POST["content"])) {
	$title = $_POST["title"];
	$content = $_POST["content"];
	$userid = $_SESSION["userid"];
	$author = $_SESSION["username"];
	$message = '';
	$stmt = mysqli_prepare($conn, "INSERT INTO posts (Title, Content, userid, author) VALUES (?, ? , ?, ?)");
	if($stmt) { 
		mysqli_stmt_bind_param($stmt, "ssis", $title, $content, $userid, $author);
		mysqli_stmt_execute($stmt);
		$message="Article posted successfully";
	} else {
		$message="An error occurred";
	}
	mysqli_stmt_close($stmt);
}
mysqli_close($conn);
?>