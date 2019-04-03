<?php 
include "../connection.php";

function deletePage($link_db, $id, $prob){
	//=================================== Suprimme les articles de la page ==============================================
	$sql = 'DELETE FROM piap_articles WHERE id_structure = '.$id.' AND problematique = '.$prob.' '; 
	//$mysqli->set_charset("SET NAMES utf8");
	$req = mysqli_query($link_db, $sql)  or exit(mysql_error() . "pageStructures_SqlTableManageFunctions.php - deletePage() : Erreur pendant la modification <br/>".$sql);
	//echo "<br>requette SQL : <br><br>".$sql;
	//echo "<br>Retour update : <br><br>".$req;

	$sql ="";
	$req ="";
	//=================================== Suprime la problematique de la structure en récupérant l'ensemble des probs, en changeant la chaine et en la renvoyant
	$sql ="SELECT problematiques FROM piap_structures WHERE id='".$id."' ";

	$i=0;
	$articles=array();
    if($req = mysqli_query($link_db, $sql) or die("Erreur d'accès à la table 'piap_structures'<br>".$sql))
	{		
		$data = mysqli_fetch_assoc($req);
		$problematiques = $data['problematiques'];
	}else $problematiques = false;

	if($problematiques){
		$probs = explode("-", $problematiques);

		$j = 0;
		$char = "";
		while($j!= count($probs)){
			if($prob == $probs[$j]){ 
				$char .= "";
			}else if($char == "") $char .= "".$probs[$j]."";
			else $char .= "-".$probs[$j]."";

			$j++;
		}
		//print_r($char);

		$sql ='UPDATE piap_structures SET problematiques="'.$char.'" WHERE id="'.$id.'"';
		$req = mysqli_query($link_db, $sql) or die("Erreur d'accès à la table 'piap_structures'<br>".$sql);

	}
}

function addPage($link_db, $id, $prob){
	$sql ="SELECT problematiques FROM piap_structures WHERE id='".$id."' ";

	$i=0;
	$articles=array();
    if($req = mysqli_query($link_db, $sql) or die("Erreur d'accès à la table 'piap_structures'<br>".$sql))
	{		
		$data = mysqli_fetch_assoc($req);
		$problematiques = $data['problematiques'];
	}else $problematiques = "";

	//echo($problematiques);

	if(!empty($problematiques)) $problematiques .= "-".$prob;
	else $problematiques .= $prob;

	$sql ='UPDATE piap_structures SET problematiques="'.$problematiques.'" WHERE id="'.$id.'"';
	$req = mysqli_query($link_db, $sql) or die("Erreur d'accès à la table 'piap_structures'<br>".$sql);
}


if(isset($_POST['todo']))
{
	switch ($_POST['todo']){
						
		case 'delete' :  $link_db = connect_to_db();
						 deletePage($link_db, $_POST['id_structure'], $_POST['problematique']);
						 close_db($link_db);

						?> <script> window.location.replace("../index.php?page=accueil_Structures"); </script> <?php
						//le rafrechissement de l'ecran se fera au retour dans cadre.php OnOffArticle(...) --- done(...)
						break;	

		case 'AskDel' : echo('Voulez vous vraiment suprimer cette page et la totalité des articles quelle contient?');
				//le rafrechissement de l'ecran se fera au retour dans cadre.php OnOffArticle(...) --- done(...)
				break;	

		case 'Add' : 
				$link_db = connect_to_db();
				addPage($link_db, $_POST['id_structure'], $_POST['problematique']);
				close_db($link_db);
				
				//le rafrechissement de l'ecran se fera au retour dans cadre.php OnOffArticle(...) --- done(...)
				break;			
		
	}
}

?>
