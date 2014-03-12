<?php
function query($sql){
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=projet_uml', 'root', '');
  	}
	catch (Exception $e)
	{
       	die('Erreur : ' . $e->getMessage());
	}
	
	$reponse = $bdd->query($sql);
	return $reponse;
}
	
function execute($sql){
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=projet_uml', 'root', '');
  	}
	catch (Exception $e)
	{
       	die('Erreur : ' . $e->getMessage());
	}
	$reponse = $bdd->exec($sql);
	return $reponse;
}

function list_films($lang){
	return query('SELECT `Nom`,`IdProgramme` FROM `informations` WHERE `Abrv` = \''.$lang."'");
}

function list_languages(){
	return query('SELECT `Nom`,`Abrv` FROM `langue`');
}

function insertAsk($movie, $lang){
	return execute('INSERT INTO `demander`(`IdProgramme`, `Abrv`) VALUES ('.$movie.',\''.$lang.'\')');
}

function insertInfo($id, $abrv, $name, $resume){
	return execute("INSERT INTO `informations`(`Nom`, `Resume`, `Genre`, `Type`, `IdProgramme`, `Abrv`) VALUES ('$name', '$resume', null, null, $id, '$abrv')");
}

function getNameFor($numero){
	return query('SELECT `Nom` FROM `informations` WHERE `IdProgramme`='.$numero.' AND `Abrv`=\'FR\'')->fetch()['Nom'];
}

function getLangNameFor($abrv){
	return query("SELECT `Nom` FROM `langue` WHERE `Abrv`='$abrv'")->fetch()['Nom'];
}
function getDemandes()
{
	return query("SELECT IdProgramme, dem.Abrv AS demAbrv, inf.Nom, inf.Abrv AS infAbrv FROM Demander dem JOIN Informations inf USING ( IdProgramme ) JOIN Langue lan ON lan.Abrv = dem.Abrv");
}
?>