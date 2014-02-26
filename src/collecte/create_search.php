<?php include "resources/listDisplay.php";?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Nouvelle recherche</title>
  </head>
  <body>
	<form method="GET" action="traitement/create_search.php">
		langue d'origine :  <select id='from' onchange="setFilmList();"><?php echo display_languages(); ?></select><br>
		Programme : <select name="numero" id="name"></select><span id="alert_name"></span><br>
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
	
	function setFilmList(){
		var xhr = new XMLHttpRequest();
		
		xhr.onreadystatechange = function(){
			if(xhr.readyState == 4 && xhr.status == 200){
				document.getElementById('name').innerHTML = xhr.responseText;
			}
		};
		
		xhr.open('GET', 'resources/listDisplay.php?disp=name&lang='+document.getElementById('from').value, true);
		xhr.send();
	}
  </script>
</html>