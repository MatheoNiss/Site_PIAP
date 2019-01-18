
<?php
global $mavarr;

$mavarr = "etape1";
echo $mavarr;


include "dialog_box.php";

function whrite_Structure(){
    global $mavarr;

    $structures = get_all_structures($mavarr);
    print_r($structures);

    for($i=0; $i = count($structures) - 1; $i++){
        echo($structure[$i]['nom']);
    }
}

?>

<div id="francemap" style="width: 500px; height: 600px;"></div>



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
                var todo = "titi";
                var url = "./admin/carte_SqlTableManageFunctions.php";
                //var scroll=getScrollPos();

                //var refreshURL = getRefreshURL('./index.php', '?page=accueil', scroll);
                //alert(refreshURL);

                var donnees = { 'todo':todo, 'code':code };
                $.post(url , donnees)
                    //.done(function(data) {alert(5);/*window.location.replace(refreshURL);*/})
                    .done(function(data) {$("#affiche_retour").html(data);})
                    //.done (function(data) {toggleOverlay("DialogBox",0,0); $("#texteBox").html(data);})
                    .fail (function(data) {toggleOverlay("DialogBox",0,0); $("#texteBox").html(data);});   
            }

        });
    });
</script>




<div id="affiche_retour" style="margin-top:2em;"></div>


<?php
    echo "<br><br>Ma variable au retour est : ".$mavarr;
?>
