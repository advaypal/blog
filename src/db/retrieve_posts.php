<?php
include("../config/db.php");
$stmt = mysqli_prepare($conn, "SELECT id, Title, Content, author, datetime, userid FROM posts ORDER BY datetime DESC");
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $id, $title, $content, $author, $datetime, $user_id);
$c = 0;
	while(mysqli_stmt_fetch($stmt)) {
			if($filter($id, $user_id, $author, $title)) {
			$c = $c + 1; //counter
			echo '
				<p> </p>
				<p> </p>
			';
			echo '
				<div class="container">
				<div class=jumbotron>
				<div class="posts">
					<div class="container">
							<a href="../views/individual.php?post_id='.$id.'"> <h3 class="text-center"> '.$title.' </h3> </a>
							<p> Written by '.$author.' on '.$datetime.' </p>
							<p>  '.nl2br($content).' </p>
						
					</div>

			';
			// if logged in and author of post
			if(isset($_SESSION["userid"]) && $_SESSION["userid"]==$user_id) {
				echo '
					<div class="container">
						<div class="row">
							<div class="col-md-1">
								<div class="text-center">
									<p>  <a href= "../db/delete.php?id='.$id.'" onclick="return deleteconfirm()"> Delete </a> </p>
								</div>
							</div>
							<div class="col-md-1">
								<div class="text-center">
									<p>  <a href= "../views/edit.php?id='.$id.'"> Edit </a> </p>
								</div>
							</div>
							<div class="col-md-1">
								<div class="text-center">
									<p>  <a href= "../views/individual.php?post_id='.$id.'"> Comment </a> </p>
								</div>
							</div>
						</div>
					</div>
					
				';
				//if logged in but not author of post
			} elseif(isset($_SESSION["userid"])) {
				echo '
					<div class="container">
						<div class="row">
							<div class="col-md-1">
								<p>  <a href= "../views/individual.php?post_id='.$id.'"> Comment </a> </p>
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

if($c==0) {
	echo '
		<div class="container">
			<h4> No posts found </h4>
		</div>
	';
}
mysqli_stmt_close($stmt);
?>
	