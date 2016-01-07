<?php
	// get all keywords out of input
	// sequentially check if each keyword exists in target
	// if yes, display, else do not
	$x = isset($_POST["author"]) && $_POST["author"]!="";
	$y = isset($_POST["title"]) && $_POST["title"]!="";
	$filter = function ($id, $userid, $author, $title) {
		$x = isset($_POST["author"]) && $_POST["author"]!="";
		$y = isset($_POST["title"]) && $_POST["title"]!="";
		$search = function ($input, $target) {
			$arr=[];
			$pos=0;
			$pos1=0;
			$input = ''.$input.' ';
			$target = ''.$target.' ';
			// this loop separates all words in the input and stores the words in an array
			for($i=0; $i< strlen($input); $i++) {
				if(!ctype_alpha($input[$i])) {
					$s=substr($input, $pos, $i - $pos);
					$c=0;
					array_push($arr, $s);
					$pos = $i + 1;
				}
			}
			// this loop checks if any of the words in the title/author name is present in the input
			for($i=0; $i< strlen($target); $i++) {
				if(!ctype_alpha($target[$i])) {
					$s=substr($target, $pos1, $i - $pos1);
					for($j = 0; $j<count($arr); $j++) {
						if(strtolower($arr[$j]) == strtolower($s)) {
						 	return true; 
						}
					}
					$pos1 = $i + 1;
				}
			}
			return false; // executed in the case of no result
		};    
		if($x && $y) { 
			return $search($_POST["author"], $author) && $search($_POST["title"], $title);
		} else {
			return ($x)? ($search($_POST["author"], $author)) : ($search($_POST["title"], $title));
		}
	};
	if($x || $y) {
		include("retrieve_posts.php");
	} else {

	}

?>