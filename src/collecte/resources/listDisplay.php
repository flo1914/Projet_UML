<?php

include_once "bdd.php";

if(isset($_GET['disp'])){
	$disp = $_GET['disp'];
	if($disp=='lang')
		display_languages();
	else if($disp=='name' && isset($_GET['lang']))
		display_namelist($_GET['lang']);
}


function display_namelist($lang){
	$list = list_films($lang);
	
	echo "<option value=''>chosissez un programme</option>";
	while($film = $list->fetch()){
		echo "<option value='".$film['IdProgramme']."'>".utf8_encode($film['Nom'])."</option>";
	}
}

function display_languages(){
	$list = list_languages();
	
	echo "<option value=''>chosissez une langue</option>";
	while($lang = $list->fetch()){
		echo "<option value='".$lang['Abrv']."'>".utf8_encode($lang['Nom'])."</option>";
	}
}

?>