<?php

//
// Lire tous les articles de la categorie
//
function get_all_articles($link_db, $categorie)
{
	$sql = "SELECT * FROM piap_articles WHERE categorie = '".$categorie."' order by id DESC"; 
    $i=0;
	$articles=array();
    if($req = mysqli_query($link_db, $sql) or die("Erreur d'accès à la table 'piap_articles'<br>".$sql))
	{		
		while($data = mysqli_fetch_assoc($req)) 
		{ 
			$articles[$i]['id']=$data['id'];
			$articles[$i]['id_titre']=$data['id_titre'];
			$articles[$i]['categorie']=$data['categorie'];
			$articles[$i]['zone']=$data['zone'];
			$articles[$i]['icone']=$data['icone'];
			$articles[$i]['titre']=$data['titre'];
			$articles[$i]['contenu']=$data['contenu'];
			$articles[$i]['auteur']=$data['auteur']; 
			$articles[$i]['date_creation']=$data['date_creation']; 
			$articles[$i]['valide']=$data['valide']; 
			$articles[$i]['show_header']=$data['show_header'];
			$articles[$i]['show_footer']=$data['show_footer'];
			$articles[$i]['show_icone']=$data['show_icone'];
			$articles[$i]['show_border']=$data['show_border'];
			$articles[$i]['show_delete']=$data['show_delete'];
			$articles[$i]['css']=$data['css'];
			$articles[$i]['tag']=$data['tag'];
			$i++;
			//html_entity_decode
		} 
	}
	//print_r($articles);
	return $articles;
}

function get_all_admins($link_db){

	$sql = "SELECT * FROM piap_admins"; 
    $i=0;
	$admins=array();
    if($req = mysqli_query($link_db, $sql) or die("Erreur d'accès à la table 'piap_admins'<br>".$sql))
	{		
		while($data = mysqli_fetch_assoc($req)) 
		{ 
			$admins[$i]['id']=$data['id'];
			$admins[$i]['etat']=$data['etat'];
			$admins[$i]['nom_utilisateur']=$data['nom_utilisateur'];
			$admins[$i]['password']=$data['password'];
			$admins[$i]['nom']=$data['nom'];
			$admins[$i]['prenom']=$data['prenom'];
			$admins[$i]['email']=$data['email'];

			$i++;
			//html_entity_decode
		} 
	}
	//print_r($articles);
	return $admins;
}

function get_all_problematiques($link_db){

	$sql = "SELECT * FROM piap_problematiques";
	$i=0;
	$problematiques=array();
	if($req = mysqli_query($link_db, $sql) or die("Erreur d'accès à la table 'piap_problematiques'<br>".$sql))
	{		
		while($data = mysqli_fetch_assoc($req)) 
		{ 
			$problematiques[$i]['id']=$data['id'];
			$problematiques[$i]['problematique']=$data['problematique'];

			$i++;
			//html_entity_decode
		} 
	}
	//print_r($articles);
	return $problematiques;
}

function get_all_cadres($link_db, $categorie){

	$sql = "SELECT * FROM piap_cadres WHERE categorie = '".$categorie."' order by id DESC";
	$i=0;
	$cadres=array();
	if($req = mysqli_query($link_db, $sql) or die("Erreur d'accès à la table 'piap_cadres'<br>".$sql))
	{		
		while($data = mysqli_fetch_assoc($req)) 
		{ 
			$cadres[$i]['id']=$data['id'];
			$cadres[$i]['zone']=$data['zone'];
			$cadres[$i]['visible']=$data['visible'];
			$cadres[$i]['largeur']=$data['largeur'];
			$cadres[$i]['show_icone']=$data['show_icone'];
			$cadres[$i]['show_boutton']=$data['show_boutton'];
			$cadres[$i]['show_footer']=$data['show_footer'];
			$cadres[$i]['show_header']=$data['show_header'];
			$cadres[$i]['show_titre']=$data['show_titre'];
			$cadres[$i]['show_image']=$data['show_image'];
			$cadres[$i]['show_border']=$data['show_border'];
			$cadres[$i]['image']=$data['image'];
			$cadres[$i]['icone']=$data['icone'];
			$cadres[$i]['titre']=$data['titre'];
			$cadres[$i]['contenu']=$data['contenu'];
			$cadres[$i]['footer']=$data['footer'];

			$i++;
			//html_entity_decode
		} 
	}
	//print_r($cadres);
	return $cadres;
}

function get_structures_departement($link_db, $departement){
	
	$sql = "SELECT * FROM piap_structures WHERE departement = ".$departement." order by id DESC";
	$i=0;
	$structures=array();
	if($req = mysqli_query($link_db, $sql) or die("Erreur d'accès à la table 'piap_structures'<br>".$sql))
	{		
		while($data = mysqli_fetch_assoc($req)) 
		{ 
			$structures[$i]['id']=$data['id'];
			$structures[$i]['id_admin']=$data['id_admin'];
			$structures[$i]['ville']=$data['ville'];
			$structures[$i]['departement']=$data['departement'];
			$structures[$i]['nom']=$data['nom'];

			$i++;
			//html_entity_decode
		} 
	}
	//print_r($structures);
	return $structures;
}

?>