<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Nouvelle recherche</title>
  </head>
  <body>
	<form method="GET" action="search.php">
		Nom : <input type="text" name="name" id="name" value=""><span id="alert_name"></span><br>
		langue de recherche :  <input type="text" id="lang" name="language" value=""><span id="alert_lang"></span><br>
		langue d'origine :  <input type="text" name="from"><br>
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