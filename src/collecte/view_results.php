<?php 
include "resources/DataSearcher.php";
include "resources/bdd.php";

$lang=$_GET['lang'];
$name=utf8_encode(getNameFor($_GET['numero']));

$findSearch = load_mdbsearch($lang, $name);
$fromSearch = load_mdbsearch('FR', $name);

$findName=find_mdbname($findSearch);
$fromName=find_mdbname($fromSearch);

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
  <style>
	fieldset{
		width: 30%;
		min-width: 420px;
		display:inline;
	}
  
	textarea{
		vertical-align:top
	}
  </style>
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
	<fieldset><legend>Informations françaises</legend>
		<label>Nom du film : </label><textarea cols=50 rows=1 id='nameo' ></textarea><br>
		<label>Résumé : </label><textarea cols=50 rows=10 id='resumeo' ></textarea><br>
	</fieldset>
	<fieldset><legend>Informations dans la langue recherchée</legend>
		<label>Nom du film : </label><textarea cols=50 rows=1 id='name' name="name" ></textarea><br>
		<label>Résumé : </label><textarea cols=50 rows=10 id='resume' name="resume" ></textarea><br>
	</fieldset>
		<input type="hidden" name="id" value="<?php echo $_GET['numero']; ?>">
		<input type="hidden" name="lang" value="<?php echo $_GET['lang']; ?>"><br>
		<input type="submit" value="Enregistrer">
	</form>
	
	
	<?php
		for($i=0; $i<count($findData); $i++){
			echo "
				<input type='hidden' id='".($i+1)."n' value=\"".$findName[$i]."\">";
			echo"
				<input type='hidden' id='".($i+1)."r' value=\"".$findData[$i]['overview']."\">";
			
			
			echo "
				<input type='hidden' id='".($i+1)."no' value=\"".$fromName[$i]."\">";
			echo"
				<input type='hidden' id='".($i+1)."ro' value=\"".$fromData[$i]['overview']."\">";
			
			
		}
	?>
		
  </body>
  <script>
	function updatescontent(){
		var choice = document.getElementById('choice').value;
		
		if(choice == 0){
			document.getElementById('name').innerText = "";
			document.getElementById('resume').innerText = "";
			document.getElementById('nameo').innerText = "";
			document.getElementById('resumeo').innerText = "";
		}
		else{
			document.getElementById('name').innerText = document.getElementById(choice+'n').value;
			document.getElementById('resume').innerText = document.getElementById(choice+'r').value;
			document.getElementById('nameo').innerText = document.getElementById(choice+'no').value;
			document.getElementById('resumeo').innerText = document.getElementById(choice+'ro').value;
		}
	}
  </script>
</html>