<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">
	// acts as a confirmation alert
		function deleteconfirm() {
			return confirm("Are you sure you wish to delete this comment?");
		}
	</script>
</head>
<body>
	<?php
		require_once("common/header.php");
		// filter is a funtion that filters out unnecessary posts based on the requirement
	    $filter = function($id, $userid, $author, $title) { return $id==$_GET["post_id"]; };
	    if(isset($_GET["message"])) {
			echo '
				<div class="container">
					<div class="container">
						<h4> '.$_GET["message"].' </h4>
					</div>	
				</div>	
				';
				}
		require_once("../db/retrieve_posts.php");
	?>
	<div class="container">
		<div class="container">
			<h3> Comments </h3>
		</div>	
			<p> </p>
			<?php
				require_once("../db/retrieve_comments.php");
				if(isset($_SESSION["userid"])) {
					echo '
					<form role="form" action="../db/insert_comment.php?id='.$_GET["post_id"].'" method="post" class="col-md-6">
						<div class="form-group">
			      			<input type="text" class="form-control" name="comment" />
			      		</div>                  
			      		<div>
			          		<p> </p>
			          		<button type="submit" class="btn btn-default"> Comment </button>
			          	</div>	
					</form>
					';
				}
			?>
		</div>
	</div>
</body>
</html>