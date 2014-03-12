<?php include "resources/bdd.php";?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Nouvelle recherche</title>
  </head>
  <body>
	<form method="GET" action="traitement/create_search.php">
		<?php
		$demande=getDemandes();
		while($ligne=$demande->fetch())
		{
		echo $ligne['Abrv'];
		echo '<a href="view_results.php?numero='.$ligne['IdProgramme'].'&lang='.$ligne['Abrv'].'"><div>';
		echo '<p>'.$ligne['Nom'].' - '.$ligne['Abrv'].'</p>';
		echo '</div></a>';
		}
		?>
	</form>
  </body>
  <script>
	
  </script>
</html>