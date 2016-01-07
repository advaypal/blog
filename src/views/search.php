<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		require_once("common/header.php");
	?>
	<p> </p>
	<p> </p>
	<p> </p>
	<div class="container">
		<form role="form" action="" method="post" class="col-md-6">
			<div class="form-group">
				<label for="text">Keywords related to title</label>
      			<input type="text" class="form-control" name="title" />
      			<label for="text">Keywords related to author</label>
      			<input type="text" class="form-control" name="author" />
      		</div>
      		<div>
          		<p> </p>
          		<button type="submit" class="btn btn-default"> Search </button>
          	</div>
		</form>
	</div>
		<?php
			require("../db/search.php");
		?>
</body>
</html>