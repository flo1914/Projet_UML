<?php

if(isset($_GET['numero']) && isset($_GET['lang'])){
	include "../resources/bdd.php";
	$list = list_films($_GET['lang']);
	$ok = true;
	
	while($row = $list->fetch()){
		if($row['IdProgramme']==$_GET['numero'])
			$ok = false;
	}
	
	if($ok)
		insertAsk($_GET['numero'], $_GET['lang']);
		
	header('Location: ../create_search.php'); 
}

?>