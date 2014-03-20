<?php include "resources/listDisplay.php"; ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Nouvelle recherche</title>
  </head>
  <body>
	<form method="GET" action="traitement/create_search.php">
		Programme : <select name="numero" id="name"><?php echo display_namelist('FR'); ?></select><span id="alert_name"></span><br>
		langue de recherche :   <select name="lang"><?php echo display_languages(); ?></select><span id="alert_lang"></span><br>
		<input type="submit" value="Chercher" onclick="return test();">
	</form>
  </body>
  <script>
	 function test(){
		var ok = true;
		if(document.getElementById('name').value == ""){
			document.getElementById("alert_name").innerHTML = "<i>veuillez remplir ce champ</i>";
			ok = false;
		}
		if(document.getElementById('lang').value == ""){
			document.getElementById("alert_lang").innerHTML = "<i>veuillez remplir ce champ</i>";
			ok = false;
		}
		
		return ok;
	}
	
  </script>
</html>