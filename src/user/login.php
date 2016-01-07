<?php
	include("../config/db.php");
	if(isset($_POST["username"]) && isset($_POST["password"])) {
		$user = $_POST["username"];
		$pwd  = $_POST["password"];
		$c = 0; 
		$message = "";
		$accounts = mysqli_query($conn, "SELECT * FROM users ORDER BY id");
		if(mysqli_num_rows($accounts) > 0) {
			while($row = mysqli_fetch_assoc($accounts)) {
				$user1 = $row["username"];
				$pwd1 = $row["password"];
				if($user == $user1 && $pwd == $pwd1) {
					//setting session variables
					$_SESSION["userid"] = $row["id"];
					$_SESSION["username"] = $row["username"];
					$c = $c+1;
				} elseif ($user == $user1 && $pwd !== $pwd1 ) {
					$message = "Incorrect Password";
					$c= $c+1;
				} else { 
				}
			}
		}
		if($c==0) {
			$message = "Invalid Username";
		}
	}
?>

