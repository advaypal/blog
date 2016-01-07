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
	    } elseif(!isset($_GET["id"]) || !isset($_GET["post_id"])) {
	    	header("Refresh:0; url=../views/homepage.php");
	    }
	    //post filter
	    $filter = function($id, $userid, $author, $title) { return $id==$_GET["post_id"]; };
		require_once("../db/retrieve_posts.php");
	?>
	<div class="container">
		<div class="container">
			<h3> Comments </h3>
		</div>	
			<p> </p>
			<?php
				//comment filter
				$filter1 = function($id) { return $id != $_GET["id"]; }; // this id is different, refers to id in retrieve posts
				require_once("../db/retrieve_comments.php");
				$stmt = mysqli_prepare($conn, "SELECT content FROM comments WHERE id= ? ");
				mysqli_stmt_bind_param($stmt, "i", $_GET["id"]);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_bind_result($stmt, $content);
				mysqli_stmt_fetch($stmt);
				if(isset($_SESSION["userid"])) {
					echo '
					<form role="form" action="../db/edit_comments.php?id='.$_GET["id"].'&post_id='.$_GET["post_id"].'" method="post" class="col-md-6">
						<div class="form-group">
			      			<input type="text" class="form-control" name="comment" value="'.$content.'"/>
			      		</div>                  
			      		<div>
			          		<p> </p>
			          		<button type="submit" class="btn btn-default"> Comment </button>
			          	</div>	
					</form>
					';
				}
				mysqli_stmt_close($stmt);
			?>
		</div>
	</div>
</body>
</html>