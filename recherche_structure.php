<?php
include "dialog_box.php";
include "cadres.php";

//----------------------------------CADRE
if(isset($_GET['problematique'])){
    $problematique = $_GET['problematique'];
}

$categorie = "page_recherche";

$link_db=connect_to_db();
$cadres = get_all_cadres($link_db, $categorie);
close_db($link_db); 

function affiche_cadre($zone, $width ,$code = ""){
    global $cadres, $adminMode; 

    for($i=0; $i<sizeof($cadres); $i++){
        if ($cadres[$i]['zone'] == $zone){
            $c = new Cadre($cadres[$i], $width, $adminMode, $code);
            $c->DessineCadre();
        }
        
    }
}

//----------------------------------------récupération + affichage de la liste
$code_liste = "";
$departement = -1;

if(isset($_GET['departement']) AND !empty($_GET['departement']) AND isset($_GET['problematique'])){

    $departement = $_GET['departement'];
    //echo "le departement est :".$departement;

    $link_db = connect_to_db();
    $structures = get_structures_departement($link_db,$departement, $problematique);
    close_db($link_db);

    $i=0;
    $code_liste = '';
    $code_liste .= '<ul>';

    while( $i != count($structures) ){
        $code_liste .= '<li><a href="index.php?page=structures&ids='.$structures[$i]['id'].'&problematique='.$problematique.'">'.$structures[$i]['nom'].' ('.$structures[$i]['ville'].')</a></li>';
        $i++;
    }

    $code_liste .= '</ul>';
}

?>

<!-- =================================================================================== -->

<link rel=stylesheet href="./css/recherche_structure.css">

<div id="r_structure">
    <h1>Dans quel département êtes vous?</h1>
    <div class="row" style="height:425px;">
        <div class="carte" id="francemap"></div>

        <div id="cadre_dep">
            <?php if(!empty($code_liste)) affiche_cadre(1, "400px" ,$code_liste);?>
        </div>
    </div>

    <br><br><br><br>
</div>



<script type="text/javascript">
    $(document).ready(function(){(
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
                var prob = <?= json_encode($problematique) ?>;
                window.location.replace(refreshURL+"&departement="+code+"&problematique="+prob);
            }

        })
    )});

</script>
