<?php
global $adminMode;

$link_db=connect_to_db();
$problematiques = get_all_problematiques($link_db);

if(isset($_SESSION['type'])){
  if($_SESSION['type'] == "admin"){
    $structure = get_one_structure($link_db, $_SESSION['id_structure']);
    $probStructures = explode("-", $structure['problematiques']);
  }
}

close_db($link_db); 
//print_r($problematiques);

// fonction qui ecrit le code de la liste de la totalitée des problematique pour les modes utilisateur et super admin
function codeListeProb(){
  global $problematiques;

  $i=0;
  $code ="";
  while($i != Count($problematiques)){
    $code.= '<li><a href="index.php?page=recherche_structure&problematique='.$problematiques[$i]['id'].'">'.$problematiques[$i]['problematique'].'</a></li>';
    $i++;
  }

  ?> <script></script> <?php

  return $code;
}

// ============================ FONCTIONS qui font le code du menu et du sous-menu en mode admin normal (structures) 

  // fonction qui écrit le code du sous-sous menu qui affiche toute les possibilitée de nouvelle page en mode admin normal
  function codeListeProbAdmin(){
    global $problematiques, $probStructures;

    $i=0;
    $code ="";
    while($i != Count($problematiques)){

      $simillaire = 0;
      $j=0;
      while($j != Count($probStructures)) {
        if($probStructures[$j] == $problematiques[$i]['id']) $simillaire = 1;
        $j++;
      }

      if($simillaire == 0) $code.= '<li><a onclick="Add('.$_SESSION['id_structure'].','.$problematiques[$i]['id'].')">'.$problematiques[$i]['problematique'].'</a></li>';
      $i++;
    }
    return $code;
  }

  // fonction qui creer le premier sousmenu de l'espace admin la ou on va afficher la liste de toutes les pages qu'on les structures
  function codeListePages(){
    global $probStructures, $problematiques;
    $code ='';

      $i=0;

    //boucle qui prend chaques problematiques de la structure et qui la met dans une colone de la liste
    while($i!= count($probStructures)){
      $prob ="";

      $j=0;
      //boucle qui verifie si la problematique I et la meme que la prob J, quand c'est la meme on met prob a la problematique en commun
      while($j != count($problematiques)){

        if($problematiques[$j]['id'] == $probStructures[$i]) $prob = $problematiques[$j]['problematique'];

        $j++;
      }

      if($prob != "") $code.= '<li><a href="index.php?page=structures&problematique='.$probStructures[$i].'">Page '.ucfirst($prob).'</a></li>';
      $i++;
    }

    $code .= '<li><a onclick="choixAdd()"><i class="fa fa-plus-square"></i> Ajouter nouvelle page</a></li>';
     $code .= '<ul class="dropdown-menu sousmenu2"> '.codeListeProbAdmin().' </ul>';
    //echo($code);
    return $code;
  }

// ===================================== TEST DES VARIABLES GLOBALES POUR LA PROBLEMATIQUES ========

if(isset($_SESSION['id_structure'])&& $adminMode == true){ 

  if(isset($_GET['problematique'])) $problematique = $_GET['problematique'];
  else if(isset($_SESSION['problematique'])) $problematique = $_SESSION['problematique'];

} else if(isset($_GET['problematique'])){ 

  $problematique = $_GET['problematique'];
}
// ==============================================================================================

?>

<script>$('body').on('hidden.bs.modal', '.modal', function () { $(this).removeData('bs.modal');});
</script>
<!-- Modal start-->

<!-- Modal end-->

<script>$('body').on('hidden.bs.modal', '.modal', function () { $(this).removeData('bs.modal');});
 </script>
<!-- Modal start-->

<!-- Modal end-->

<script>$('body').on('hidden.bs.modal', '.modal', function () { $(this).removeData('bs.modal');});
  </script>
<nav class="navbar navbar-olive-dark" id="navbar_h" role="navigation">
  <div class="container-fluid">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar_id">
        <span class="sr-only couleur">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
      </button> 
      <!-- gestion de l'apparition des elements du menu si l'utilisateur n'est pas admin-->
      <?php if(!$adminMode){ ?>
        <a class="navbar-brand couleur" href="index.php?page=accueil"><i class="fa fa-home "></i> PIAP jeune</a>
        <span>
          <a data-toggle="dropdown" href="javascript:void(0);" id="ddshort" class="navbar-brand couleur" aria-expanded="true"><i class="fa fa-bars"></i>&nbsp;<span class="hidden-sm hidden-md reverse"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Quelle problématique?</font></font></span><span class="caret"></span></a>

          <ul class="dropdown-menu liste_problematiques">
            <?= codeListeProb() ?>
          </ul>
        </span>

      <!-- gestion de l'apparition des elements du menu si l'utilisateur est le superAdmin-->
      <?php }else if(isset($_SESSION['type'])){ if($_SESSION['type'] == "superAdmin"){?>

        <a class="navbar-brand couleur" href="index.php?page=accueil"><i class="fa fa-home "></i> PIAP jeune</a>
        
        <span>
          <a data-toggle="dropdown" href="javascript:void(0);" id="ddshort" class="navbar-brand couleur" aria-expanded="true"><i class="fa fa-bars"></i>&nbsp;<span class="hidden-sm hidden-md reverse"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Quelle problématique?</font></font></span><span class="caret"></span></a>

          <ul class="dropdown-menu liste_problematiques">
            <?= codeListeProb() ?>
          </ul>
        </span>

        <a class="navbar-brand couleur" href="index.php?page=accueil_SuperAdmin"> Accueil super Admin</a>

      <!-- gestion de l'apparition des elements du menu si l'utilisateur est un admin (une structure) -->
      <?php }else if($_SESSION['type'] == "admin"){ ?>
        <a class="navbar-brand couleur" href="index.php?page=accueil_Structures"><i class="fa fa-home "></i> Accueil Structure</a>

        <a data-toggle="dropdown" href="javascript:void(0);" id="ddshort" class="navbar-brand couleur" aria-expanded="true"><i class="fa fa-bars"></i>&nbsp;<span class="hidden-sm hidden-md reverse"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"> Vos Pages </font></font></span><span class="caret"></span></a>

        <ul class="dropdown-menu liste_problematiques"> <?= codeListePages(); ?> </ul>

      <?php }} ?>

    </div>
    <div class="collapse navbar-collapse" id="navbar_id">
      <ul class="nav navbar-nav navbar-right">
        <?php if(isset($_GET['page'] )&& isset($_SESSION['type'])){ if($_GET['page'] == "structures" && $_SESSION['type'] == "admin"){ ?>
           <button type="button" class="btn_sup navbar-brand" onclick="deletePage(<?= $_SESSION['id_structure'] ?>, <?=$problematique ?>)"><a><i class="fa fa-trash"></i> Supprimmer la page</a></button>
        <?php }} ?>
      </ul>
    </div>
  </div>
</nav>

<script>
  function deletePage(id, prob){
    //alert('suis dans deleteArticle(id)');
    var todo = "AskDel"; 
    
    var scroll=getScrollPos();
    var scrollTop = scroll.Top;
    var scrollLeft = scroll.Left;

    var refreshURL = "index.php?page=accueil_Structures";
    
    var id_structure = id;
    var problematique = prob;
    
    var htmlTitre = 'Attention !  ';
    var htmlIcone = '<img src="./images/lightbox/dialogBox/attention32.png" border="no" />';
    
    var functionToCall = "javascript:toggleOverlay('DialogBox', "+scrollLeft+" ,  "+scrollTop+" );";
    
    var htmlBoutons  = '<center>';
    htmlBoutons += '  <form method="POST" action="./admin/pageStructures_SqlTableManageFunctions.php"  >';
    
    htmlBoutons += '  <button  type="submit"  name="todo" value="delete" >Oui</button>';
    htmlBoutons += '  <button  type="submit"  name="todo" value="cancel" onmousedown="'+functionToCall+'" >Non</button>';
    
    htmlBoutons += '  <input  type="hidden"  name="id_structure" value="'+id_structure+'" />';
    htmlBoutons += '  <input  type="hidden"  name="problematique" value="'+problematique+'" />';
    htmlBoutons += '  <input  type="hidden"  name="scrollTop" value="'+scrollTop+'" />';
    htmlBoutons += '  <input  type="hidden"  name="scrollLeft" value="'+scrollLeft+'" />';
    htmlBoutons += '  <input  type="hidden"  name="refreshURL" value="'+refreshURL+'" />';
    htmlBoutons += '  </form>';
    htmlBoutons += '</center>';
    //alert(htmlBoutons);

    var url = "./admin/pageStructures_SqlTableManageFunctions.php";
    var donnees = { 'todo':todo };
    $.post(url ,donnees )
      .done(function(data) {
        toggleOverlay("DialogBox", scrollLeft, scrollTop); 
        $("#titleBox").html(htmlTitre);
        $("#iconeBox").html(htmlIcone);
        $("#FooterDialogBox").html(htmlBoutons);
        $("#texteBox").html(data);
        })
      .fail (function(data) {//alert(5);
        toggleOverlay("DialogBox", scrollLeft, scrollTop); 
        $("#titleBox").html(htmlTitre);
        $("#iconeBox").html(htmlIcone);
        $("#texteBox").html(data);
        $("#FooterDialogBox").html(htmlBoutons);
        });

      /*toggleOverlay("DialogBox", scrollLeft, scrollTop); 
          $("#titleBox").html(htmlTitre);
          $("#iconeBox").html(htmlIcone);
          $("#FooterDialogBox").html(htmlBoutons);
          $("#texteBox").html(data);*/
  }

  function Add(id, problematique){

    var todo = "Add";
    var url = "./admin/pageStructures_SqlTableManageFunctions.php";
    var scroll=getScrollPos();
    
    var donnees = { 'todo':todo, 'id_structure':id, 'problematique':problematique };
    $.post(url , donnees)
      .done(function(data) {window.location.replace("index.php?page=structures&problematique="+problematique)})
      //.done (function(data) {toggleOverlay("DialogBox",0,0); $("#texteBox").html(data);})
      .fail (function(data) {toggleOverlay("DialogBox",0,0); $("#texteBox").html(data);});
  }

  function choixAdd(){
    if($(".sousmenu2").css("display") == "block") $(".sousmenu2").css("display", "none");
    else $(".sousmenu2").css("display", "block");
    
  }

</script>