<?php
include_once "cadres.php";

$categorie = "page_accueil_Structures";
$link_db=connect_to_db();
$structure = get_one_structure($link_db, $_SESSION['id_structure']);
$cadres = get_all_cadres($link_db, $categorie);
close_db($link_db);	

function affiche_cadre($zone, $code = ""){
	global $cadres, $adminMode; 

	for($i=0; $i<sizeof($cadres); $i++){
		if ($cadres[$i]['zone'] == $zone){
			$c = new Cadre($cadres[$i], 700, false, $code);
			$c->DessineCadre();
		}
		
	}
}

if(isset($_POST['sub_Parametre'])){
	if(isset($_POST['tb_Password1']) && isset($_POST['tb_Password2'])){
		if($_POST['tb_Password1'] != $_POST['tb_Password2']){
			$passok = false;
		}else{
			$passok = true;
		}
	}
}

$Parametre = "";
$Parametre .= ' <form id="formParametre" method="post" action="index.php?page=accueil_Structures"> <br>';
$Parametre .= ' 		<label for="tbNom">Nom de la Structure </label>';
$Parametre .= ' 	  	<input class="tb_Nom" id="tb_Nom" type="text" name="NomStructures" placeholder="Nom structure"><br><br>';
$Parametre .= ' 	  	<label for="Departements">Département de la structure </label>';
$Parametre .= ' 		<select name="Departement" id="Departements">';
$Parametre .= ' 	        <option value="01">Ain</option> <option value="02">Aisne</option>';
$Parametre .= ' 	        <option value="03">Allier</option> <option value="04">Alpes-de-Haute-Provence</option>';
$Parametre .= ' 	        <option value="07">Ardèche</option> <option value="08">Ardennes</option>';
$Parametre .= ' 	        <option value="09">Ariège</option> <option value="10">Aube</option>';
$Parametre .= ' 	        <option value="11">Aude</option> <option value="12">Aveyron</option>';
$Parametre .= ' 	        <option value="13">Bouches-du-Rhône</option> <option value="14">Calvados</option>';
$Parametre .= ' 	        <option value="15">Cantal</option> <option value="16">Charente</option>';
$Parametre .= ' 	        <option value="17">Charente-Maritime</option> <option value="18">Cher</option>';
$Parametre .= ' 	        <option value="19">Corrèze</option> <option value="2A">Corse-du-sud</option>';
$Parametre .= ' 	        <option value="2B">Haute-corse</option> <option value="21">Côte-d\'or</option>';
$Parametre .= ' 	        <option value="22">Côtes-d\'armor</option> <option value="23">Creuse</option>';
$Parametre .= ' 	        <option value="24">Dordogne</option> <option value="25">Doubs</option>';
$Parametre .= ' 	        <option value="26">Drôme</option> <option value="27">Eure</option>';
$Parametre .= ' 	        <option value="28">Eure-et-Loir</option> <option value="29">Finistère</option>';
$Parametre .= ' 	        <option value="30">Gard</option> <option value="31">Haute-Garonne</option>';
$Parametre .= ' 	        <option value="32">Gers</option> <option value="33">Gironde</option>';
$Parametre .= ' 	        <option value="34">Hérault</option> <option value="35">Ile-et-Vilaine</option>';
$Parametre .= ' 	        <option value="36">Indre</option> <option value="37">Indre-et-Loire</option>';
$Parametre .= ' 	        <option value="38">Isère</option> <option value="39">Jura</option>';
$Parametre .= ' 	        <option value="40">Landes</option> <option value="41">Loir-et-Cher</option>';
$Parametre .= ' 	        <option value="42">Loire</option> <option value="43">Haute-Loire</option>';
$Parametre .= ' 	        <option value="44">Loire-Atlantique</option> <option value="45">Loiret</option>';
$Parametre .= ' 	        <option value="46">Lot</option> <option value="47">Lot-et-Garonne</option>';
$Parametre .= ' 	        <option value="48">Lozère</option> <option value="49">Maine-et-Loire</option>';
$Parametre .= ' 	        <option value="50">Manche</option> <option value="51">Marne</option>';
$Parametre .= ' 	        <option value="52">Haute-Marne</option> <option value="53">Mayenne</option>';
$Parametre .= ' 	        <option value="54">Meurthe-et-Moselle</option> <option value="55">Meuse</option>';
$Parametre .= ' 	        <option value="56">Morbihan</option> <option value="57">Moselle</option>';
$Parametre .= ' 	        <option value="58">Nièvre</option> <option value="59">Nord</option>';
$Parametre .= ' 	        <option value="60">Oise</option> <option value="61">Orne</option>';
$Parametre .= ' 	        <option value="62">Pas-de-Calais</option> <option value="63">Puy-de-Dôme</option>';
$Parametre .= ' 	        <option value="64">Pyrénées-Atlantiques</option> <option value="65">Hautes-Pyrénées</option>';
$Parametre .= ' 	        <option value="66">Pyrénées-Orientales</option> <option value="67">Bas-Rhin</option>';
$Parametre .= ' 	        <option value="68">Haut-Rhin</option> <option value="69">Rhône</option>';
$Parametre .= ' 	        <option value="70">Haute-Saône</option> <option value="71">Saône-et-Loire</option>';
$Parametre .= ' 	        <option value="72">Sarthe</option> <option value="73">Savoie</option>';
$Parametre .= ' 	        <option value="74">Haute-Savoie</option> <option value="75">Paris</option>';
$Parametre .= ' 	        <option value="76">Seine-Maritime</option> <option value="77">Seine-et-Marne</option>';
$Parametre .= ' 	        <option value="78">Yvelines</option> <option value="79">Deux-Sèvres</option>';
$Parametre .= ' 	        <option value="80">Somme</option> <option value="81">Tarn</option>';
$Parametre .= ' 	        <option value="82">Tarn-et-Garonne</option> <option value="83">Var</option>';
$Parametre .= ' 	        <option value="84">Vaucluse</option> <option value="85">Vendée</option>';
$Parametre .= ' 	        <option value="86">Vienne</option> <option value="87">Haute-Vienne</option>';
$Parametre .= ' 	        <option value="88">Vosges</option> <option value="89">Yonne</option>';
$Parametre .= ' 	        <option value="90">Territoire de Belfort</option> <option value="91">Essonne</option>';
$Parametre .= ' 	        <option value="92">Hauts-de-Seine</option> <option value="93">Seine-Saint-Denis</option>';
$Parametre .= ' 	        <option value="94">Val-de-Marne</option> <option value="95">Val-d\'oise</option>';
$Parametre .= ' 	        <option value="976">Mayotte</option> <option value="971">Guadeloupe</option>';
$Parametre .= ' 	        <option value="973">Guyane</option> <option value="972">Martinique</option>';
$Parametre .= ' 	        <option value="974">Réunion</option>';
$Parametre .= '        	</select>';
$Parametre .= '         <br><br>';

$Parametre .= '         <label for="tb_Login">Login </label>';
$Parametre .= '         <input class="tb_Login" id="tb_Login" type="text" name="login" placeholder="'.$_SESSION['login'].'"><br><br>';

$Parametre .= '         <label for="tb_Password1">Mot de passe </label>        ';
$Parametre .= '         <input class="tb_Password1" id="tb_Password1" type="password" name="tb_Password1" placeholder="Mot de passe"><br><br>';

$Parametre .= '         <label for="tb_Password2">Confirmation du Mot de passe </label>  ';
$Parametre .= '         <input class="tb_Password2" id="tb_Password2" type="password" name="tb_Password2" placeholder="Confirmation mot de passe"><br><br>';

if(isset($passok)){
	if(!$passok) $Parametre .= ' <div class="messagePassword"> Vous devez renseigner deux mêmes mots de passe! </div> ';
}

$Parametre .= '         <input type="submit" name="sub_Parametre">';
$Parametre .= ' </form>';

?>

<link rel="stylesheet" href="./css/accueil_Structures.css">

<div class="titre"> Bienvenu dans votre espace, <?= $_SESSION["admin_name"] ?> </div> <br><br>

<div class="acces_page">
	<div> Votre page :</div>
	<a href="index.php?page=structures"> Page de <?= $structure[0]['nom'] ?></a>
</div>

<div class="parametre">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<?php affiche_cadre(1, $Parametre); ?>
		</div>
	</div>
</div>

