<?php 
	include_once('./connection.php'); 
	include_once ('./fonctions.php');
?>


<?php
	$adminMode = false;

	if (isset($_GET['deconnect'])) {
		if ($_GET['deconnect']=="yes"){	
			$adminMode = false;
			session_unset(); // on efface toutes les variables de session 
			session_destroy(); // on detruit la session en cours. 
		}
	}

	if (isset($_SESSION['type'])){	if($_SESSION['type']=="admin")	{ $adminMode = true; }	} 



	if(isset($_GET['scrollTop'])) $scrollTop=$_GET['scrollTop'];
	else $scrollTop = 0;
	if(isset($_GET['scrollLeft'])) $scrollLeft=$_GET['scrollLeft'];
	else $scrollLeft = 0;

	$page="";
	if (isset($_GET['page'])) $page = $_GET['page'];
		
	$niveau="";
	if (isset($_GET['niveau'])) $niveau = $_GET['niveau'];

	$id_article="";
	if (isset($_GET['id_article'])) $id_article = $_GET['id_article'];
?>