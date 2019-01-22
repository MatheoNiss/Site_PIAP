<?php
include "dialog_box.php";
include "cadres.php";

//----------------------------------CADRE

$categorie = "page_recherche";

$link_db=connect_to_db();
$cadres = get_all_cadres($link_db, $categorie);
close_db($link_db); 

function affiche_cadre($zone, $code = ""){
    global $cadres, $adminMode; 

    for($i=0; $i<sizeof($cadres); $i++){
        if ($cadres[$i]['zone'] == $zone){
            $c = new Cadre($cadres[$i], $adminMode, $code);
            $c->DessineCadre();
        }
        
    }
}

//----------------------------------------récupération + affichage de la liste
$code_liste = "";
$departement = -1;

if(isset($_GET['departement']) AND !empty($_GET['departement'])){

    $departement = $_GET['departement'];
    //echo "le departement est :".$departement;

    $link_db = connect_to_db();
    $structures = get_structures_departement($link_db,$departement);
    close_db($link_db);

    $i=0;
    $code_liste = '';
    $code_liste .= '<ul>';

    while( $i != count($structures) ){
        $code_liste .= '<li><a>'.$structures[$i]['nom'].'</a></li>';
        $i++;
    }

    $code_liste .= '</ul>';
}

?>

<link rel=stylesheet href="./css/recherche_structure.css">

<div id="r_structure">
    <div class="carte" id="francemap"></div>

    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <?php if(!empty($code_liste)) affiche_cadre(1, $code_liste);?>
    </div>

    <br><br><br><br>
</div>



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
                var scroll=getScrollPos();
                var refreshURL = getRefreshURL('./index.php', '?page=recherche_structure', scroll);

                window.location.replace(refreshURL+"&departement="+code);
            }

        });
    });
</script>
