<?php
	
	if(isset($_GET['name']) && isset($_GET['id']) && isset($_GET['lang']) && isset($_GET['resume'])){
		include "../resources/bdd.php";
		insertInfo($_GET['id'], $_GET['lang'], $_GET['name'], $_GET['resume']);
	}

?>