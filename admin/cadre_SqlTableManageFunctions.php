
<?php


function setCadreOnOrOff($id, $etat){
	global $host, $user, $password, $bdd;
	
	$mysqli  = new mysqli($host, $user, $password, $bdd);
	if (mysqli_connect_error()) {
		die('Erreur de connexion (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}
	
	$sql = "UPDATE piap_cadres SET visible = ".$etat." WHERE id = '".$id."';" ;
	
	//$mysqli->set_charset("SET NAMES utf8");
	$req = mysqli_query($mysqli, $sql)  or exit(mysql_error() . "cadre_SqlTableManageFunctions.php - setCadreOnOrOff() : Erreur pendant la modification <br/>".$sql);
	//echo "<br>requette SQL : <br><br>".$sql;
	//echo "<br>Retour update : <br><br>".$req;

	$mysqli->close();
}

function SetCadreHeaderOnOrOff($id, $etat){
	global $host, $user, $password, $bdd;
	
	$mysqli  = new mysqli($host, $user, $password, $bdd);
	if (mysqli_connect_error()) {
		die('Erreur de connexion (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}

	$sql = "UPDATE piap_cadres SET show_header = ".$etat." WHERE id = '".$id."';" ;

	//$mysqli->set_charset("SET NAMES utf8");
	$req = mysqli_query($mysqli, $sql)  or exit(mysql_error() . "article_SqlTableManageFunctions.php - SetCadreHeaderOnOrOf() : Erreur pendant la modification <br/>".$sql);
	//echo "<br>requette SQL : <br><br>".$sql;
	//echo "<br>Retour update : <br><br>".$req;

	$mysqli->close();
}

function SetCadreFooterOnOrOff($id, $etat){
	global $host, $user, $password, $bdd;
	
	$mysqli  = new mysqli($host, $user, $password, $bdd);
	if (mysqli_connect_error()) {
		die('Erreur de connexion (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}

	$sql = "UPDATE piap_cadres SET show_footer = ".$etat." WHERE id = '".$id."';" ;

	//$mysqli->set_charset("SET NAMES utf8");
	$req = mysqli_query($mysqli, $sql)  or exit(mysql_error() . "article_SqlTableManageFunctions.php - SetCadreFooterOnOrOf() : Erreur pendant la modification <br/>".$sql);
	//echo "<br>requette SQL : <br><br>".$sql;
	//echo "<br>Retour update : <br><br>".$req;

	$mysqli->close();
}

function SetCadreIconeOnOrOff($id, $etat){
	global $host, $user, $password, $bdd;
	
	$mysqli  = new mysqli($host, $user, $password, $bdd);
	if (mysqli_connect_error()) {
		die('Erreur de connexion (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}

	$sql = "UPDATE piap_cadres SET show_icone = ".$etat." WHERE id = '".$id."';" ;

	//$mysqli->set_charset("SET NAMES utf8");
	$req = mysqli_query($mysqli, $sql)  or exit(mysql_error() . "article_SqlTableManageFunctions.php - SetCadreFooterOnOrOf() : Erreur pendant la modification <br/>".$sql);
	//echo "<br>requette SQL : <br><br>".$sql;
	//echo "<br>Retour update : <br><br>".$req;

	$mysqli->close();
}

//------------------------------------------------------------------------------------------------------------
include_once('../connection.php'); 


//print_r($_POST);

if(isset($_POST['todo']))
{
	switch ($_POST['todo']){
		
						
		case 'SetOnOff' : setCadreOnOrOff($_POST['id_cadre'], $_POST['visible']);
						//le rafrechissement de l'ecran se fera au retour dans cadre.php OnOffArticle(...) --- done(...)
						break;
						
		case 'SetCadreHeaderOnOrOff' : SetCadreHeaderOnOrOff($_POST['id_cadre'], $_POST['etat']);
						break;
		
		case 'SetCadreFooterOnOrOff' : SetCadreFooterOnOrOff($_POST['id_cadre'], $_POST['etat']);
						break;

		case 'SetCadreIconeOnOrOff' : SetCadreIconeOnOrOff($_POST['id_cadre'], $_POST['etat']);
						break;
						
	}
}


?>

<script>

</script>
