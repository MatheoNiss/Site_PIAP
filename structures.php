<?php
include_once "article.php";
include_once "cadres.php";

if(isset($_SESSION['id_structure'])&& $adminMode == true){ 
	$id_structure = $_SESSION['id_structure'];
	if(isset($_GET['problematique'])) $problematique = $_GET['problematique'];
	else if(isset($_SESSION['problematique'])) $problematique = $_SESSION['problematique'];

	 $_SESSION['problematique'] = $problematique;
}
else if(isset($_GET['ids']) && isset($_GET['problematique'])){ 
	$id_structure = $_GET['ids'];
	$problematique = $_GET['problematique'];
}

settype($id_structure, "int");	

/*$id_structure = 1;
$problematique = 1;*/

$categorie = "page_structures";
$link_db=connect_to_db();
$articles = get_all_articles($link_db, $categorie, $id_structure,$problematique);
$cadres = get_all_cadres($link_db, $categorie);
close_db($link_db);	


function afficheNouvelleZoneArticle($zone){
	global $adminMode, $categorie, $id_structure, $problematique;
	$newArticle['id'] = 0;
	$newArticle['problematique'] = $problematique;
	$newArticle['id_structure'] = $id_structure;
	$newArticle['categorie'] = $categorie;
	$newArticle['zone'] = $zone;
	$newArticle['icone'] = "icon-tag";
	$newArticle['titre'] = "...";
	$newArticle['contenu'] = "...";
	//$newArticle['auteur'] = $_SESSION['auteur'];
	$newArticle['date_creation'] = date("Y-m-d H:i:s");
	$newArticle['valide'] = false;
	$newArticle['show_header'] = true;
	$newArticle['show_footer'] = true;
	$newArticle['show_border'] = true;
	$newArticle['show_icone'] = true;
	$newArticle['show_delete'] = true;
	$newArticle['css'] = "";
	$newArticle['tag'] = -1;
	$art1 =  new Article($newArticle, $adminMode);
	$art1->displayArticle();
}

function afficheZone($zone){
	global $adminMode, $articles, $categorie, $dbTable, $id_structure;

	if($adminMode){
		afficheNouvelleZoneArticle($zone);
		for($i=0; $i<sizeof($articles); $i++){
			if ($articles[$i]['zone'] == $zone){
					$art1 = new Article($articles[$i], $adminMode);
					$art1->displayArticle();
				}
		}
	}
	else{
		for($i=0; $i<sizeof($articles); $i++){
			if($articles[$i]['valide'] != false){
				if ($articles[$i]['zone'] == $zone){
					$art1 = new Article($articles[$i], $adminMode);
					$art1->displayArticle();
				}
			}
		}
	}
}

?>

	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<!--<div id="titre"><h2>Titre de la page </h2><hr></div>-->
			<?php afficheZone(1); ?>
		</div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<!--<div id="titre"><h2>Titre de la page </h2><hr></div>-->
			<?php afficheZone(0); ?>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<!--<div id="titre"><h2>Titre de la page </h2><hr></div>-->
			<?php afficheZone(3); ?>
		</div>
	</div>