<?php

$link_db=connect_to_db();
$problematiques = get_all_problematiques($link_db);	
close_db($link_db);

if(isset($_POST['btn_sub'])){
	$cb_checked = array()
	for($i=0; $i< count($problematiques); $i++){
		if($_POST[$i]) $cb_checked[$i] = 1;
		else $cb_checked[$i] = 0;
	}
}
function afficher_problematiques(){
	global $problematiques;
	$code ="";

	$code .= '<form method="post">';
	for($i = 0; $i < count($problematiques); $i++){
		$code .= '<input type="checkbox" id="problematique_'.$i.'" onclick="" name="'$i'">';
		$code .= '<label for="problematique_'.$i.'">'.$problematiques[$i]['problematique'].'</label>';
		$code .= '<br>';
	} 
	$code .= '<div>';
	$code .= '<button style="float: right;" name="btn_sub" type="submit">Valider vos choix</button>';
	$code .= '</div>';
	$code .= '</form>';
	echo $code;
}
?>

<link rel="stylesheet" href="./css/problematique_admin.css">

<div id="problematique_admin">
	<div class="liste">
		<?php afficher_problematiques(); ?>
	</div>
	<!--<div class="bouton">
		<button><i class="fa fa-arrow-left"></i></button><br><br>
		<button><i class="fa fa-arrow-right"></i></button>
	</div>-->
</div>
<script src="./js/problematique_admin.js"></script>
