<?php
$post_id = $_GET["post_id"];
$comments = mysqli_query($conn, "SELECT * FROM comments ORDER BY datetime DESC");
$stmt= mysqli_prepare($conn, "SELECT id, userid, content, postid, author, datetime FROM comments ORDER BY datetime DESC");
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $id, $user_id, $content, $postid, $author, $datetime);
$count = 0;
	while(mysqli_stmt_fetch($stmt)) {
		// the second condition is to mask the comment that is being edited
		if($postid== $post_id && ((isset($filter1))? $filter1($id) : true))  {
			$count = $count + 1;
			echo '
			<div class = "container">
			<div class = "jumbotron">
			<div class = "comments">
				<div class="container"
					<p> '.nl2br($content).' <p>
					<p> Written by '.$author.' on '.$datetime.'<p> 
				</div>

			';
			// if logged in and author of comment
			if(isset($_SESSION["userid"])&&($_SESSION["userid"]==$user_id)) {
				echo '
				<div class="container">
						<div class="row">
							<div class="col-md-1">
								<div class="text-center">
									<p>  <a href= "../db/delete_comment.php?id='.$id.'&post_id='.$post_id.'" onclick="return deleteconfirm()"> Delete </a> </p>
								</div>
							</div>
							<div class="col-md-1">
								<div class="text-center">
									<p>  <a href= "../views/edit_comment.php?id='.$id.'&post_id='.$post_id.'"> Edit </a> </p>
								</div>
							</div>
						</div>
				</div>
				';
			}
				echo '
			</div>
			</div>
			</div>
				';
			
		}
	}
if($count == 0) {
	echo '
		<div class="container">
			<h5> There are no comments for this article </h5>	
		</div>
		<p> </p>
		<p> </p>
	';
}
mysqli_stmt_close($stmt);
?>