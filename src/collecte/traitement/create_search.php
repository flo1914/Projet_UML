<?php

if(isset($_GET['numero']) && isset($_GET['lang'])){
	include "../resources/bdd.php";
	insertAsk($_GET['numero'], $_GET['lang']);
}

?>