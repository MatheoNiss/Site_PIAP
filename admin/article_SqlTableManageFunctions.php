
<?php
////!!!! $connect_error était erroné jusqu'en PHP 5.2.9 et 5.3.0.
	/*
	if ($mysqli->connect_error) {
		die('Erreur de connexion (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
	}
	*/
	

// '###' sera remplacé à chaque fois par l'id de l'article associé à la ressource	
//$carousselDir = './uploads/ressources_pedagogiques/###/caroussel/';
$ressourceDirBase = '../uploads/ressources_pedagogiques/';
	
//---------------------------------------------------------------------------------------------------------
//Select article with this id
//---------------------------------------------------------------------------------------------------------

function get_article($id)
{	global $host, $user, $password, $bdd;
	
	$mysqli  = new mysqli($host, $user, $password, $bdd);
	
	if (mysqli_connect_error()) {
		die('Erreur de connexion (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}
	$sql = "SELECT * FROM piap_articles WHERE id='".$id."'"; 
    
	$article=array();
	
    if($req = mysqli_query($mysqli, $sql) or die("article_SqlTableManageFunctions.php - get_article()  : Erreur d'accès à la table 'piap_articles'<br>".$sql))
	{		
		while($data = mysqli_fetch_assoc($req)) 
		{ 
			$article['id']=$data['id'];
			$article['id_titre']=$data['id_titre'];
			$article['categorie']=$data['categorie'];
			$article['zone']=$data['zone'];
			$article['icone']=$data['icone'];
			$article['titre']=$data['titre'];
			$article['contenu']=$data['contenu'];
			$article['auteur']=$data['auteur']; 
			$article['date_creation']=$data['date_creation']; 
			$article['valide']=$data['valide']; 
			$article['show_header']=$data['show_header'];
			$article['show_footer']=$data['show_footer'];
			$article['show_icone']=$data['show_icone'];
			$article['show_border']=$data['show_border'];
			$article['show_delete']=$data['show_delete'];
			$article['css']=$data['css'];
			$article['tag']=$data['tag'];
		} 
		
	}
	$mysqli->close();
	
	return($article);
}


//---------------------------------------------------------------------------------------------------------
//Delete article
//--------------------------------------------------------------------------------------------------------
function delete_article($link_db, $id, $categorie)
{
	$sql = "DELETE  FROM piap_articles WHERE id = '".$id."'"; 

	$result = mysqli_query($link_db , $sql);
	if (!$result) {
		die("article_SqlTableManageFunctions.php - delete_article() : Erreur pendant la suppression dans la table piap_articles'<br>".$sql);
	}
	else {
		if($categorie=="ressources_pedagogiques"){
			$sql2 = "DELETE  FROM tec_ressources WHERE id_article = '".$id."'"; 
			$result= mysqli_query($link_db, $sql2) or die("article_SqlTableManageFunctions.php - delete_article() : Erreur pendant la suppression dans la table ressources'<br>".$sql2);
		}
	}
	
	//$req1 = mysqli_query($link_db, $sql) or die("article_SqlTableManageFunctions.php - delete_article() : Erreur pendant la suppression'<br>".$sql);
	
}

//Cette fonction demande la confirmation par oui ou non de l'éfaccement d'un article de la table des piap_articles
function confirmDeleteArticle($article){
	include_once "../article.php";
	$art1 = new Article($article, false);

	$form = "Souhaitez-vous supprimer définitivement cet article ?<br>";
	$form .= "<u>Attention :</u> tous les détails relatifs à cet article<br>";
	$form .= "seront supprimés de la base de données";
	$form .= $art1->drawArticle();
	echo $form;
}


//---------------------------------------------------------------------------------------------------------
//Update article
//--------------------------------------------------------------------------------------------------------


function update_article($contenu, $id, $fieldName, $categorie, $niveau){
	
	global $host, $user, $password, $bdd;
	
	$mysqli  = new mysqli($host, $user, $password, $bdd);
	if (mysqli_connect_error()) {
		die('Erreur de connexion (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}
	
	if($fieldName === "titre"){
		
		if($categorie==="ressources_pedagogiques"){
			if($contenu == "") $contenu = "Accèder à la ressource";
			$lien = "<a href='./index.php?page=details_ressources_pedagogiques&niveau=".$niveau."&id_article=".$id."'>".$contenu."</a>";
		}
		else {$lien = $contenu;}
		$contenu = $lien;
	}

	$contenu = mysqli_real_escape_string($mysqli, $contenu);
	
	//netoyer les \n ajoutés par CkEditor
	if (strpos($contenu,'\n') !== false) {
		$contenu = str_replace('\n', '', $contenu);
	}
	
	$sql = "UPDATE piap_articles SET ".$fieldName." = '".$contenu."' WHERE id = '".$id."';" ;
	
	$mysqli->set_charset("SET NAMES utf8");
	$req = mysqli_query($mysqli, $sql)  or exit(mysql_error() . "article_SqlTableManageFunctions.php - update_article() : Erreur pendant la modification <br/>".$sql);
	//echo "<br>requette SQL : <br><br>".$sql;
	//echo "<br>Retour update : <br><br>".$req;
	$mysqli->close();
	
}

function setArticleOnOrOff($id, $etat){
	global $host, $user, $password, $bdd;
	
	$mysqli  = new mysqli($host, $user, $password, $bdd);
	if (mysqli_connect_error()) {
		die('Erreur de connexion (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}
	
	$sql = "UPDATE piap_articles SET valide = ".$etat." WHERE id = '".$id."';" ;
	
	//$mysqli->set_charset("SET NAMES utf8");
	$req = mysqli_query($mysqli, $sql)  or exit(mysql_error() . "article_SqlTableManageFunctions.php - setArticleOnOrOff() : Erreur pendant la modification <br/>".$sql);
	//echo "<br>requette SQL : <br><br>".$sql;
	//echo "<br>Retour update : <br><br>".$req;
	$mysqli->close();
}


//change l'etat de article_show_header dans la base de donnees piap_articles
function setArticleHeaderOnOrOff($id, $etat){
	global $host, $user, $password, $bdd;
	
	$mysqli  = new mysqli($host, $user, $password, $bdd);
	if (mysqli_connect_error()) {
		die('Erreur de connexion (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}
	
	$sql = "UPDATE piap_articles SET show_header = ".$etat." WHERE id = '".$id."';" ;
	
	//$mysqli->set_charset("SET NAMES utf8");
	$req = mysqli_query($mysqli, $sql)  or exit(mysql_error() . "article_SqlTableManageFunctions.php - setArticleHeaderOnOrOff() : Erreur pendant la modification <br/>".$sql);
	//echo "<br>requette SQL : <br><br>".$sql;
	//echo "<br>Retour update : <br><br>".$req;
	$mysqli->close();
}

//change l'etat de article_show_footer dans la table piap_articles
function setArticleFooterOnOrOff($id, $etat){
	global $host, $user, $password, $bdd;
	
	$mysqli  = new mysqli($host, $user, $password, $bdd);
	if (mysqli_connect_error()) {
		die('Erreur de connexion (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}
	
	$sql = "UPDATE piap_articles SET show_footer = ".$etat." WHERE id = '".$id."';" ;
	
	//$mysqli->set_charset("SET NAMES utf8");
	$req = mysqli_query($mysqli, $sql)  or exit(mysql_error() . "article_SqlTableManageFunctions.php - setArticleFooterOnOrOff() : Erreur pendant la modification <br/>".$sql);
	//echo "<br>requette SQL : <br><br>".$sql;
	//echo "<br>Retour update : <br><br>".$req;
	$mysqli->close();
}

//change l'etat de article_show_border dans la table piap_articles
function setArticleBorderOnOrOff($id, $etat){
	global $host, $user, $password, $bdd;
	
	$mysqli  = new mysqli($host, $user, $password, $bdd);
	if (mysqli_connect_error()) {
		die('Erreur de connexion (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}
	
	$sql = "UPDATE piap_articles SET show_border = ".$etat." WHERE id = '".$id."';" ;
	
	//$mysqli->set_charset("SET NAMES utf8");
	$req = mysqli_query($mysqli, $sql)  or exit(mysql_error() . "article_SqlTableManageFunctions.php - setArticleBorderOnOrOff() : Erreur pendant la modification <br/>".$sql);
	//echo "<br>requette SQL : <br><br>".$sql;
	//echo "<br>Retour update : <br><br>".$req;
	$mysqli->close();
}

//change l'etat de article_show_border dans la table piap_articles
function setArticleIconeOnOrOff($id, $etat){
	global $host, $user, $password, $bdd;
	
	$mysqli  = new mysqli($host, $user, $password, $bdd);
	if (mysqli_connect_error()) {
		die('Erreur de connexion (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}
	
	$sql = "UPDATE piap_articles SET show_icone = ".$etat." WHERE id = '".$id."';" ;
	
	//$mysqli->set_charset("SET NAMES utf8");
	$req = mysqli_query($mysqli, $sql)  or exit(mysql_error() . "article_SqlTableManageFunctions.php - setArticleIconeOnOrOff() : Erreur pendant la modification <br/>".$sql);
	//echo "<br>requette SQL : <br><br>".$sql;
	//echo "<br>Retour update : <br><br>".$req;
	$mysqli->close();
}


//---------------------------------------------------------------------------------------------------------
//Insert article
//--------------------------------------------------------------------------------------------------------

//Inserer un article dans la table des piap_articles
function insert_article($link_db, $icone, $titre, $contenu, $auteur, $categorie, $niveau, $zone,  $etat, $css, $tag)
{
	global  $ressourceDirBase;
	$categorie_niveau = $categorie;
	if ($niveau !== "") $categorie_niveau = $categorie_niveau."|".$niveau;
	
	$today = date("Y-m-d H:i:s");
	$valide= true;
	
	$titre = mysqli_real_escape_string($link_db, $titre);
	$contenu = mysqli_real_escape_string($link_db, $contenu);
	$auteur = mysqli_real_escape_string($link_db, $auteur);
	$css = mysqli_real_escape_string($link_db, $css);
	
	//netoyer les \n ajoutés par CkEditor
	if (strpos($titre,'\n') !== false) { $titre = str_replace('\n', '', $titre); 	}
	if (strpos($contenu,'\n') !== false) { $contenu = str_replace('\n', '', $contenu); 	}
	if (strpos($auteur,'\n') !== false) { $auteur = str_replace('\n', '', $auteur); 	}
	
	$sql = "INSERT INTO piap_articles ( 
				categorie,
				zone,
				icone,
				titre,	
				contenu, 
				auteur,
				date_creation,
				valide,
				show_header,
				show_footer,
				show_border,
				show_icone,
				css,
				tag)
								
			VALUES	('".
				$categorie_niveau."', '".
				$zone."', '".
				$icone."', '".
				$titre."', '".
				$contenu."', '".
				$auteur."', '".
				$today."', ".
				$valide.", ".
				$etat['show_header'].", ".
				$etat['show_footer'].", ".
				$etat['show_border'].", ".
				$etat['show_icone'].", '".
				$css."', ".
				$tag." ".
				");";

	$req = mysqli_query($link_db, $sql) or die("Erreur dans insert_article : <br>".$sql); 
	//echo "<br>requette SQL : <br><br>".$sql;
	//echo "<br>Retour update : <br><br>".$req;
	$lastInsertID = mysqli_insert_id($link_db);
	
	if($categorie=="ressources_pedagogiques"){
		if($titre == "") $titre = "Accèder à la ressource";
		$carousselDir = $lastInsertID."/caroussel/";
		//insertion d'une ligne dans la table tec_ressources
		insert_ressource($link_db, $lastInsertID, $titre, $niveau, "", "", "", "", "", "", -1);
		
		//Création du lien sur le titre de l'article associé à la ressource
		$lien = "<a href='./index.php?page=details_ressources_pedagogiques&niveau=".$niveau."&id_article=".$lastInsertID."'>".$titre."</a>";
		$lien = mysqli_real_escape_string($link_db, $lien);
		if (strpos($lien,'\n') !== false) { $lien = str_replace('\n', '', $lien); 	}
		
		$sql = "UPDATE piap_articles SET titre = '".$lien."' WHERE id = ".$lastInsertID.";" ;
		$req = mysqli_query($link_db, $sql)  or exit(mysql_error() . "article_SqlTableManageFunctions.php - insert_article() : Erreur pendant la modification <br/>".$sql);
		//echo "<br>requette SQL : <br><br>".$sql;
		//echo "<br>Retour update : <br><br>".$req;
		$oldumask = umask(0); 
		if(! mkdir($ressourceDirBase.$lastInsertID."/", 0777)) { echo "Echec dans la création du dossier".$ressourceDirBase.$lastInsertID;}
		umask($oldumask); 
		$oldumask = umask(0); 
		if(! mkdir($ressourceDirBase.$carousselDir."/", 0777)) { echo "Echec dans la création du dossier".$ressourceDirBase.$carousselDir;}
		umask($oldumask); 
		/*
		if(! mkdir($ressourceDirBase.$lastInsertID."/", 0770)) { echo "Echec dans la création du dossier".$ressourceDirBase.$lastInsertID;}
		if(! mkdir($ressourceDirBase.$carousselDir."/", 0770)) { echo "Echec dans la création du dossier".$ressourceDirBase.$carousselDir;}
		
		*/
	}
	
}

//---------------------------------------------------------------------------------------------------------
//Insert ressource
//--------------------------------------------------------------------------------------------------------

//Inserer une ressource dans la table des ressources
function insert_ressource($link_db, $id_article, $titre_article, $niveau, $texte_1, $texte_2, $texte_3, $auteur, $images, $css, $tag)
{
	
	$texte_1 = mysqli_real_escape_string($link_db, $texte_1);
	$texte_2 = mysqli_real_escape_string($link_db, $texte_2);
	$texte_3 = mysqli_real_escape_string($link_db, $texte_3);
	$auteur = mysqli_real_escape_string($link_db, $auteur);
	$images = mysqli_real_escape_string($link_db, $images);
	
	//netoyer les \n ajoutés par CkEditor
	if (strpos($texte_1,'\n') !== false) { $texte_1 = str_replace('\n', '', $texte_1); 	}
	if (strpos($texte_2,'\n') !== false) { $texte_2 = str_replace('\n', '', $texte_2); 	}
	if (strpos($texte_3,'\n') !== false) { $texte_3 = str_replace('\n', '', $texte_3); 	}
	if (strpos($images,'\n') !== false) { $images = str_replace('\n', '', $images); 	}
	if (strpos($auteur,'\n') !== false) { $auteur = str_replace('\n', '', $auteur); 	}
	
	$sql = "INSERT INTO tec_ressources ( 
				id_article,
				titre_article,
				niveau,
				texte_1,
				texte_2,
				texte_3,	
				images, 
				auteur,
				css,
				tag
				)
								
			VALUES	(".
				$id_article.", '".
				$titre_article."', '".
				$niveau."', '".
				$texte_1."', '".
				$texte_2."', '".
				$texte_3."', '".
				$images."', '".
				$auteur."', '".
				$css."', ".
				$tag." ".
				");";

	$req = mysqli_query($link_db, $sql) or die("Erreur dans insert_ressource : <br>".$sql); 
	//echo "<br>requette SQL : <br><br>".$sql;
	//echo "<br>Retour update : <br><br>".$req;
}



//---------------------------------------------------------------------------------------------------------
//Update ressource
//--------------------------------------------------------------------------------------------------------


function update_ressource($contenu, $id, $fieldName){
	
	global $host, $user, $password, $bdd;
	
	$mysqli  = new mysqli($host, $user, $password, $bdd);
	if (mysqli_connect_error()) {
		die('Erreur de connexion (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}
	
	$contenu = mysqli_real_escape_string($mysqli, $contenu);
	
	//netoyer les \n ajoutés par CkEditor
	if (strpos($contenu,'\n') !== false) {
		$contenu = str_replace('\n', '', $contenu);
	}
	
	$sql = "UPDATE tec_ressources SET ".$fieldName." = '".$contenu."' WHERE id = '".$id."';" ;
	
	$mysqli->set_charset("SET NAMES utf8");
	$req = mysqli_query($mysqli, $sql)  or exit(mysql_error() . "article_SqlTableManageFunctions.php - update_ressource() : Erreur pendant la modification <br/>".$sql);
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
		case 'update' : $id_article = $_POST['id_article'];
						$fieldName = $_POST['fieldName'];
						$contenu =$_POST['data'];
						$categorie =$_POST['categorie'];
						$niveau =$_POST['niveau'];
						update_article($contenu, $id_article, $fieldName, $categorie, $niveau);
						break;
						
		case 'AskDel' : $idToDelete = $_POST['id_article'];
						$article = get_article($idToDelete);
						confirmDeleteArticle($article);
						break;
						
		case 'delete' : $link_db=connect_to_db();
						delete_article($link_db, $_POST['id_article'], $_POST['categorie']);
						close_db($link_db);	
						//retour à la page accueil après suppression
						
						//$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
						//$url = "Refresh:0; url=../index.php?page=accueil&scrollLeft=".$_POST['scrollLeft']."&scrollTop=".$_POST['scrollTop'];
						$url ="Refresh:0; url=".$_POST['refreshURL'];
						header($url);
						break;
						
		case 'SetOnOff' : setArticleOnOrOff($_POST['id_article'], $_POST['valide']);
						//le rafrechissement de l'ecran se fera au retour dans article.php OnOffArticle(...) --- done(...)
						break;
						
		case 'SetHeaderOnOff' : setArticleHeaderOnOrOff($_POST['id_article'], $_POST['show_header']);
						//le rafrechissement de l'ecran se fera au retour dans article.php OnOffHeaderArticle(...) --- done(...)
						break;
		case 'SetFooterOnOff' : setArticleFooterOnOrOff($_POST['id_article'], $_POST['show_footer']);
						//le rafrechissement de l'ecran se fera au retour dans article.php OnOffHeaderArticle(...) --- done(...)
						break;
		case 'SetBorderOnOff' : setArticleBorderOnOrOff($_POST['id_article'], $_POST['show_border']);
						//le rafrechissement de l'ecran se fera au retour dans article.php OnOffHeaderArticle(...) --- done(...)
						break;
		case 'SetIconeOnOff' : setArticleIconeOnOrOff($_POST['id_article'], $_POST['show_icone']);
						//le rafrechissement de l'ecran se fera au retour dans article.php OnOffHeaderArticle(...) --- done(...)
						break;
						
		case 'add' : 	$link_db=connect_to_db();
						$etat['show_header'] =$_POST['showHeader'];
						$etat['show_footer'] =$_POST['showFooter'];
						$etat['show_border'] =$_POST['showBorder'];
						$etat['show_icone'] =$_POST['showIcone'];
						insert_article($link_db, $_POST['icone'], $_POST['titre'], $_POST['contenu'], $_POST['auteur'], $_POST['categorie'], $_POST['niveau'],$_POST['zone'], $etat, $_POST['css'], $_POST['tag']);
						close_db($link_db);	
						//le rafrechissement de l'ecran se fera au retour dans article.php addArticle(...) --- done(...)
						break;

		case 'update_ressource': 	$id_ressource = $_POST['id_ressource'];
									$fieldName = $_POST['fieldName'];
									$contenu =$_POST['data'];
									update_ressource($contenu, $id_ressource, $fieldName);
									break;
		
	}
}


?>

<script>

</script>
