<?php
	
	if(isset($_GET['name']) && isset($_GET['resume'])){
		include "../resources/bdd.php";
		insertInfo($_GET['numero'], $_GET['lang']);
	}

?>