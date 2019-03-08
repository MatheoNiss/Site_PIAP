<!--<link rel="stylesheet" type="text/css" href="./css/maPage.css" />-->

<?php
include_once "article.php";
include_once "cadres.php";


$categorie = "page_accueil";
$link_db=connect_to_db();
$articles = get_all_articles($link_db, $categorie);
$cadres = get_all_cadres($link_db, $categorie);
close_db($link_db);	

//print_r($articles);

function afficheNouvelleZoneArticle($zone){
	global $adminMode, $categorie;
	$newArticle['id'] = 0;
	$newArticle['id_titre'] = -1;
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
	global $adminMode, $articles, $categorie, $dbTable;

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

function affiche_cadre($zone, $code = ""){
	global $cadres, $adminMode; 

	for($i=0; $i<sizeof($cadres); $i++){
		if ($cadres[$i]['zone'] == $zone){
			$c = new Cadre($cadres[$i], $adminMode, $code);
			$c->DessineCadre();
		}
		
	}
}

?>

<div class="container-fluid">
	<div id="chemin" class="hidden-xs"> > <a href="./index.php"> Accueil ></a> mettre ici le titre du lien > </div>
	<div class="row">
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<!--<div id="titre"><h2>Titre de la page </h2><hr></div>-->
			<?php afficheZone(0); ?>
		</div>
		<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
			<!--<div id="titre"><h2>Titre de la page </h2><hr></div>-->
			<?php afficheZone(1); ?>
		</div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
            <!--<div id="titre"><h2>Titre de la page </h2><hr></div>-->
            <?php afficheZone(2); ?>
        </div>
	</div>

	<!--<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div id="titre"><h2>Titre de la page </h2><hr></div>
			<?php affiche_cadre(1); ?>
		</div>
	</div>

    <br><br><br><br>-->
</div>


<!--<div id="francemap" style="width: 400px; height: 300px;"></div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#francemap').vectorMap({
            map: 'france_fr',
            hoverOpacity: 0.5,
            hoverColor: false,
            backgroundColor: "#ffffff",
            colors: couleurs,
            borderColor: "#000000",
            selectedColor: "#EC0000",
            enableZoom: true,
            showTooltip: true,
            onRegionClick: function(element, code, region)
            {
                var message = 'Département : "'
                    + region 
                    + '" || Code : "'
                    + code
                    + '"';
             
                alert(message);
            }
        });
    });
    </script>
-->

<!--
    <div>
    <select id="map-selector" class="form-control" name="departements" multiple="multiple" style="display: block; height: 300px; margin-top : 20px; ">
        <option value="FR-01">Ain</option>
        <option value="FR-02">Aisne</option>
        <option value="FR-03">Allier</option>
        <option value="FR-04">Alpes-de-Haute-Provence</option>
        <option value="FR-05">Hautes-Alpes</option>
        <option value="FR-06">Alpes-Maritimes</option>
        <option value="FR-07">Ardèche</option>
        <option value="FR-08">Ardennes</option>
        <option value="FR-09">Ariège</option>
        <option value="FR-10">Aube</option>
        <option value="FR-11">Aude</option>
        <option value="FR-12">Aveyron</option>
        <option value="FR-13">Bouches-du-Rhône</option>
        <option value="FR-14">Calvados</option>
        <option value="FR-15">Cantal</option>
        <option value="FR-16">Charente</option>
        <option value="FR-17">Charente-Maritime</option>
        <option value="FR-18">Cher</option>
        <option value="FR-19">Corrèze</option>
        <option value="FR-2A">Corse-du-sud</option>
        <option value="FR-2B">Haute-corse</option>
        <option value="FR-21">Côte-d'or</option>
        <option value="FR-22">Côtes-d'armor</option>
        <option value="FR-23">Creuse</option>
        <option value="FR-24">Dordogne</option>
        <option value="FR-25">Doubs</option>
        <option value="FR-26">Drôme</option>
        <option value="FR-27">Eure</option>
        <option value="FR-28">Eure-et-Loir</option>
        <option value="FR-29">Finistère</option>
        <option selected="" value="FR-30">Gard</option>
        <option value="FR-31">Haute-Garonne</option>
        <option value="FR-32">Gers</option>
        <option value="FR-33">Gironde</option>
        <option selected="" value="FR-34">Hérault</option>
        <option value="FR-35">Ile-et-Vilaine</option>
        <option value="FR-36">Indre</option>
        <option value="FR-37">Indre-et-Loire</option>
        <option value="FR-38">Isère</option>
        <option value="FR-39">Jura</option>
        <option value="FR-40">Landes</option>
        <option value="FR-41">Loir-et-Cher</option>
        <option value="FR-42">Loire</option>
        <option value="FR-43">Haute-Loire</option>
        <option value="FR-44">Loire-Atlantique</option>
        <option value="FR-45">Loiret</option>
        <option value="FR-46">Lot</option>
        <option value="FR-47">Lot-et-Garonne</option>
        <option value="FR-48">Lozère</option>
        <option value="FR-49">Maine-et-Loire</option>
        <option value="FR-50">Manche</option>
        <option value="FR-51">Marne</option>
        <option value="FR-52">Haute-Marne</option>
        <option value="FR-53">Mayenne</option>
        <option value="FR-54">Meurthe-et-Moselle</option>
        <option value="FR-55">Meuse</option>
        <option value="FR-56">Morbihan</option>
        <option value="FR-57">Moselle</option>
        <option value="FR-58">Nièvre</option>
        <option value="FR-59">Nord</option>
        <option value="FR-60">Oise</option>
        <option value="FR-61">Orne</option>
        <option value="FR-62">Pas-de-Calais</option>
        <option value="FR-63">Puy-de-Dôme</option>
        <option value="FR-64">Pyrénées-Atlantiques</option>
        <option value="FR-65">Hautes-Pyrénées</option>
        <option value="FR-66">Pyrénées-Orientales</option>
        <option value="FR-67">Bas-Rhin</option>
        <option value="FR-68">Haut-Rhin</option>
        <option value="FR-69">Rhône</option>
        <option value="FR-70">Haute-Saône</option>
        <option value="FR-71">Saône-et-Loire</option>
        <option value="FR-72">Sarthe</option>
        <option value="FR-73">Savoie</option>
        <option value="FR-74">Haute-Savoie</option>
        <option value="FR-75">Paris</option>
        <option value="FR-76">Seine-Maritime</option>
        <option value="FR-77">Seine-et-Marne</option>
        <option value="FR-78">Yvelines</option>
        <option value="FR-79">Deux-Sèvres</option>
        <option value="FR-80">Somme</option>
        <option value="FR-81">Tarn</option>
        <option value="FR-82">Tarn-et-Garonne</option>
        <option value="FR-83">Var</option>
        <option value="FR-84">Vaucluse</option>
        <option value="FR-85">Vendée</option>
        <option value="FR-86">Vienne</option>
        <option value="FR-87">Haute-Vienne</option>
        <option value="FR-88">Vosges</option>
        <option value="FR-89">Yonne</option>
        <option value="FR-90">Territoire de Belfort</option>
        <option value="FR-91">Essonne</option>
        <option value="FR-92">Hauts-de-Seine</option>
        <option value="FR-93">Seine-Saint-Denis</option>
        <option value="FR-94">Val-de-Marne</option>
        <option value="FR-95">Val-d'oise</option>
        <option value="FR-976">Mayotte</option>
        <option value="FR-971">Guadeloupe</option>
        <option value="FR-973">Guyane</option>
        <option value="FR-972">Martinique</option>
        <option value="FR-974">Réunion</option>
    </select>
</div>


--> 






