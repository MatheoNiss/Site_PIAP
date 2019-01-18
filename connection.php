<?php


$host = "localhost";
$user ="root";
$password ="";
$bdd = "site_piap";


function connect_to_db(){
	global $host, $user, $password, $bdd;
	
	$link_db = mysqli_connect($host, $user, $password, $bdd);
	if (!$link_db) {
    die('Erreur de connexion : '.$host.' -  '.$user.' - '.$password.' - '.$bdd.' (' . mysqli_connect_errno() . ') '
            . mysqli_connect_error());
	}
	
	return $link_db;
}

function close_db($link_db){
	mysqli_close($link_db);
}

?>
