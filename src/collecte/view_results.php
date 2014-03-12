<?php 
include "resources/DataSearcher.php";
include "resources/bdd.php";

$lang=$_GET['lang'];
$name=utf8_encode(getNameFor($_GET['numero']));

$findSearch = load_mdbsearch($lang, $name);
$fromSearch = load_mdbsearch('FR', $name);

$findName=find_mdbname($findSearch);
$fromName=find_mdbname($fromSearch);
echo $findName[0];
$urls=find_mdburl($findSearch);

foreach($urls as $url){
	$findData[]=find_mdbdata(load_mdbdata($lang, $url));
	$fromData[]=find_mdbdata(load_mdbdata('FR', $url));
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Nouvelle recherche</title>
  </head>
  <body>
	<h3>Informations sur le film : <?php echo $name ?> en <?php echo $lang."(".getLangNameFor($lang).")" ?></h3>
	<label>résultats trouvés : <?php echo count($findName); ?></label><br><select id='choice' onchange="updatescontent();">
	<?php 
		echo "<option value='0'>choisir un résultat</option>"; 
		for($i=0; $i<count($findName); $i++)
			echo "<option value='".($i+1)."'>".$findName[$i]."</option>"; 
	?>
	</select>
	<br>
	<br>
	<form method="GET" action="traitement/insert_infos.php">
		<label>Nom du film : </label><textarea id='name' name="name" ></textarea><br>
		<label>Résumé : </label><textarea id='resume' name="resume" ></textarea><br>
		<input type="hidden" name="id" value="<?php echo $_GET['numero']; ?>">
		<input type="hidden" name="lang" value="<?php echo $_GET['lang']; ?>">
		<input type="submit" value="Enregistrer">
	</form>
	
	<?php
		for($i=0; $i<count($findData); $i++){
			echo "
				<input type='hidden' id='".($i+1)."n' value='".$findName[$i]."'>";
			//if(isset($findData[$i]['overview']))
				echo"
				<input type='hidden' id='".($i+1)."r' value='".$findData[$i]['overview']."'>";
			// else
				// echo"
				// <input type='hidden' id='".($i+1)."r' value='".""."'>";
				// $findData[$i]['overview']
		}
	?>
		
  </body>
  <script>
	function updatescontent(){
		var choice = document.getElementById('choice').value;
		document.getElementById('name').innerText = document.getElementById(choice+'n').value;
		document.getElementById('resume').innerText = document.getElementById(choice+'r').value;
	}
  </script>
</html>