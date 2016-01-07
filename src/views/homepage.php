<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
		//acts as a confirmation alert
		function deleteconfirm() {
			return confirm("Are you sure you wish to delete this post?");
		}
	</script>
</head>
<body>
	<?php
		require_once("common/header.php");
	?>
	<div class = "container">
	<div class = "Header">
		<div class = "container">
			<h1 class="text-center"> Advay's blog </h1>
		</div>
	</div>
	</div>
	<?php
		//display message
		if(isset($_GET["message"]) && (!isset($message) || $message=="")) {
			$msg = $_GET["message"];
			echo '
				<div class="container">
					<div class="col-md-10">
						<h4> '.$msg.'</h4>
					</div>
				</div>
			';
		}
		//filter out unnecessary posts
		$filter = function($id, $userid, $author, $title) { return true; };
		require_once("../db/retrieve_posts.php");
	?>
</body>
</html>